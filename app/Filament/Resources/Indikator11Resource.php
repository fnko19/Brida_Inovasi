<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator11Resource\Pages;
use App\Filament\Resources\Indikator11Resource\RelationManagers;
use App\Models\Indikator11;
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

class Indikator11Resource extends Resource
{
    protected static ?string $model = Indikator11::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama11_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter11')
                    ->label('Parameter')
                        ->options([
                            'Telah terdapat Pedoman teknis berupa buku manual' => 'Telah terdapat Pedoman teknis berupa buku manual',
                            'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik' => 'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik',
                            'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial' => 'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial',


                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot11 = match ($state) {
                                'Telah terdapat Pedoman teknis berupa buku manual' => 1,
                                'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik' => 2,
                                'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial' => 3,

                                default => 0,
                            };
                            $set('bobot11', $bobot11); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot11')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot11')) 
                        ->required(),
                    
                    Select::make('inovasi11_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi11_id') 
                                ? request()->query('inovasi11_id') 
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
                    ->getStateUsing(fn () => '<p>Pedoman Teknis</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Ketentuan dasar penggunaan inovasi daerah</p><p> berupa buku petunjuk/manual book)</p>')
                    ->html(),
                    TextColumn::make('parameter11')
                    ->label('Parameter'),
                TextColumn::make('bobot11')->label('Bobot'),
                TextColumn::make('permanent_column3')
                    ->label('Jenis Dokumen')
                    ->getStateUsing(fn() => 'Dokumen/Foto/Gambar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('viewDocuments')
                    ->label('')
                    ->url(fn (Indikator11 $record) => route('filament.admin.resources.indikator11-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator11s::route('/'),
            'create' => Pages\CreateIndikator11::route('/create'),
            'edit' => Pages\EditIndikator11::route('/{record}/edit'),
        ];
    }
}
