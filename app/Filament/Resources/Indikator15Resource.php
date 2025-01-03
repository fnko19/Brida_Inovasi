<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator15Resource\Pages;
use App\Filament\Resources\Indikator15Resource\RelationManagers;
use App\Models\Indikator15;
use App\Models\inovasi_daerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Indikator15Resource extends Resource
{
    protected static ?string $model = Indikator15::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama15_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('PilihParam')
                        ->options([
                            '1' => 'Non-Digital',
                            '2' => 'Digital'
                        ])
                        ->required()
                        ->reactive(),
                    Select::make('parameter15')
                        ->label('Parameter')
                        ->options([
                           'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah' => 'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah',
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan' => 'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan',
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain' => 'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot15 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah' => 2,
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan' => 4,
                            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain' => 6,
                            default => 0,
                            };
                            $set('bobot15', $bobot15); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('PilihParam') !== '2'),
                    Select::make('parameter15')
                        ->label('Parameter')
                        ->options([
                           'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Layanan inovasi berjalan secara tersendiri (independen)' => 'Layanan inovasi berjalan secara tersendiri (independen)',
                            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan' => 'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan',
                            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan' => 'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot15 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Layanan inovasi berjalan secara tersendiri (independen)' => 2,
                            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan' => 4,
                            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan' => 6,
                            default => 0,
                            };
                            $set('bobot15', $bobot15); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('PilihParam') !== '1'),
                    TextInput::make('bobot15')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot15')) 
                        ->required(),
                    
                    Select::make('inovasi15_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi15_id') 
                                ? request()->query('inovasi15_id') 
                                : session('last_selected_inovasi_id', inovasi_daerah::first()->id);
                        })
                        //->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('permanent_column1')
                ->label('Indikator')
                ->getStateUsing(fn () => '<p>Layanan Terintegrasi</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Digital/Non-Digital</p>')
                ->html(),
                TextColumn::make('parameter15')
                ->label('Parameter'),
            TextColumn::make('bobot15')->label('Bobot'),
            TextColumn::make('permanent_column3')
                ->label('Jenis Dokumen')
                ->getStateUsing(fn() => 'Foto/Gambar'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('viewDocuments')
                ->label('')
                ->url(fn (Indikator15 $record) => route('filament.admin.resources.indikator15-files.index', ['dokumen' => $record->id]))
                ->icon('heroicon-o-document-text')
                ->tooltip('Lihat Dokumen'),
        ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndikator15s::route('/'),
            'create' => Pages\CreateIndikator15::route('/create'),
            'edit' => Pages\EditIndikator15::route('/{record}/edit'),
        ];
    }
}
