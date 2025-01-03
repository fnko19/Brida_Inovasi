<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator9Resource\Pages;
use App\Filament\Resources\Indikator9Resource\RelationManagers;
use App\Models\Indikator9;
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

class Indikator9Resource extends Resource
{
    protected static ?string $model = Indikator9::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama9_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter9')
                    ->label('Parameter')
                        ->options([
                            'Inovasi melibatkan 1-2 Perangkat Daerah' => 'Inovasi melibatkan 1-2 Perangkat Daerah',
                            'Inovasi melibatkan 3-4 Perangkat Daerah' => 'Inovasi melibatkan 3-4 Perangkat Daerah',
                            'Inovasi melibatkan 5 Perangkat Daerah atau lebih' => 'Inovasi melibatkan 5 Perangkat Daerah atau lebih',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot9 = match ($state) {
                                'Inovasi melibatkan 1-2 Perangkat Daerah'  => 1,
                                'Inovasi melibatkan 3-4 Perangkat Daerah' => 2,
                                'Inovasi melibatkan 5 Perangkat Daerah atau lebih' => 3,
                                default => 0,
                            };
                            $set('bobot9', $bobot9); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot9')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot9')) 
                        ->required(),
                    
                    Select::make('inovasi9_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi9_id') 
                                ? request()->query('inovasi9_id') 
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
                    ->getStateUsing(fn () => '<p>Jejaring Inovasi</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Jumlah Perangkat Daerah yang</p><p> terlibat dalam penerapan inovasi</p><p> (dalam 2 tahun terakhir)</p>')
                    ->html(),
                    TextColumn::make('parameter9')
                    ->label('Parameter'),
                TextColumn::make('bobot9')->label('Bobot'),
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
                    ->url(fn (Indikator9 $record) => route('filament.admin.resources.indikator9-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator9s::route('/'),
            'create' => Pages\CreateIndikator9::route('/create'),
            'edit' => Pages\EditIndikator9::route('/{record}/edit'),
        ];
    }
}
