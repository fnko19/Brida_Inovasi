<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator4Resource\Pages;
use App\Filament\Resources\Indikator4Resource\RelationManagers;
use App\Models\Indikator4;
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

class Indikator4Resource extends Resource
{
    protected static ?string $model = Indikator4::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama4_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter4')
                    ->label('Parameter')
                        ->options([
                            'Pelaksanaan kerja secara manual/non elektronik' => 'Pelaksanaan kerja secara manual/non elektronik',
                            'Pelaksanaan kerja secara elektronik' => 'Pelaksanaan kerja secara elektronik',
                            'Pelaksanaan kerja sudah didukung sistem informasi online/daring' => 'Pelaksanaan kerja sudah didukung sistem informasi online/daring',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot4 = match ($state) {
                                'Pelaksanaan kerja secara manual/non elektronik' => 2,
                                'Pelaksanaan kerja secara elektronik' => 4,
                                'Pelaksanaan kerja sudah didukung sistem informasi online/daring' => 6,
                                default => 0,
                            };
                            $set('bobot4', $bobot4); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot4')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot4')) 
                        ->required(),
                    
                    Select::make('inovasi4_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi4_id') 
                                ? request()->query('inovasi4_id') 
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
                    ->getStateUsing(fn () => '<p>Alat Kerja</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Alat kerja dalam pelaksanaan Inovasi</p><p> yang diterapkan</p>')
                    ->html(),
                    TextColumn::make('parameter4')
                    ->label('Parameter'),
                TextColumn::make('bobot4')->label('Bobot'),
                TextColumn::make('permanent_column3')
                    ->label('Jenis Dokumen')
                    ->getStateUsing(fn() => 'Dokumen PDF/Foto/Gambar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('viewDocuments')
                    ->label('')
                    ->url(fn (Indikator4 $record) => route('filament.admin.resources.indikator4-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator4s::route('/'),
            'create' => Pages\CreateIndikator4::route('/create'),
            'edit' => Pages\EditIndikator4::route('/{record}/edit'),
        ];
    }
}
