<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator13Resource\Pages;
use App\Filament\Resources\Indikator13Resource\RelationManagers;
use App\Models\Indikator13;
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

class Indikator13Resource extends Resource
{
    protected static ?string $model = Indikator13::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama13_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter13')
                        ->label('Parameter')
                        ->options([
                            'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih' => 'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih',
                            'Hasil inovasi diperoleh dalam waktu 2-5 hari' => 'Hasil inovasi diperoleh dalam waktu 2-5 hari',
                            'Hasil inovasi diperoleh dalam waktu 1 hari' => 'Hasil inovasi diperoleh dalam waktu 1 hari',

                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot13 = match ($state) {
                                'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih' => 2,
                                'Hasil inovasi diperoleh dalam waktu 2-5 hari' => 4,
                                'Hasil inovasi diperoleh dalam waktu 1 hari' => 6,

                                default => 0,
                            };
                            $set('bobot13', $bobot13); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot13')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot13')) 
                        ->required(),
                    
                    Select::make('inovasi13_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi13_id') 
                                ? request()->query('inovasi13_id') 
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
                ->getStateUsing(fn () => '<p>Kemudahan proses inovasi yang dihasilkan</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Indikator ini ditujukan untuk mengukur</p><p> kecepatan layanan inovasi yang diperoleh</p><p> oleh pengguna.</p>')
                ->html(),
                TextColumn::make('parameter13')
                ->label('Parameter'),
            TextColumn::make('bobot13')->label('Bobot'),
            TextColumn::make('permanent_column3')
                ->label('Jenis Dokumen')
                ->getStateUsing(fn() => 'Dokumen PDF'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('viewDocuments')
                ->label('')
                ->url(fn (Indikator13 $record) => route('filament.admin.resources.indikator13-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator13s::route('/'),
            'create' => Pages\CreateIndikator13::route('/create'),
            'edit' => Pages\EditIndikator13::route('/{record}/edit'),
        ];
    }
}
