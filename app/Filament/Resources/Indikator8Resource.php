<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator8Resource\Pages;
use App\Filament\Resources\Indikator8Resource\RelationManagers;
use App\Models\Indikator8;
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

class Indikator8Resource extends Resource
{
    protected static ?string $model = Indikator8::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama8_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter8')
                    ->label('Parameter')
                        ->options([
                            'Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah' => 'Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah',
                            'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah' => 'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah',
                            'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah' => 'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah',

                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot8 = match ($state) {
                                'Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah'  => 1,
                                'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah' => 2,
                                'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah' => 3,
                                default => 0,
                            };
                            $set('bobot8', $bobot8); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot8')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot8')) 
                        ->required(),
                    
                    Select::make('inovasi8_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi8_id') 
                                ? request()->query('inovasi8_id') 
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
                    ->getStateUsing(fn () => '<p>Pelaksana Inovasi Daerah</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Penetapan tim pelaksana inovasi daerah</p>')
                    ->html(),
                    TextColumn::make('parameter8')
                    ->label('Parameter'),
                TextColumn::make('bobot8')->label('Bobot'),
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
                    ->url(fn (Indikator8 $record) => route('filament.admin.resources.indikator8-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator8s::route('/'),
            'create' => Pages\CreateIndikator8::route('/create'),
            'edit' => Pages\EditIndikator8::route('/{record}/edit'),
        ];
    }
}
