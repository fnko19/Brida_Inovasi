<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator5Resource\Pages;
use App\Filament\Resources\Indikator5Resource\RelationManagers;
use App\Models\Indikator5;
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

class Indikator5Resource extends Resource
{
    protected static ?string $model = Indikator5::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama5_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter5')
                    ->label('Parameter')
                        ->options([
                            'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain' => 'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain',
                            'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)' => 'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)',
                            'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)' => 'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot5 = match ($state) {
                                'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain' => 1,
                                'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)' => 2,
                                'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)' => 3,
                                default => 0,
                            };
                            $set('bobot5', $bobot5); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot5')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot5')) 
                        ->required(),
                    
                    Select::make('inovasi5_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi5_id') 
                                ? request()->query('inovasi5_id') 
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
                    ->getStateUsing(fn () => '<p>Bimtek Inovasi</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Peningkatan kapasitas dan kompetensi</p><p> pelaksana inovasi daerah baik sebagai</p><p> penyedia atau penerima bimtek</p>')
                    ->html(),
                    TextColumn::make('parameter5')
                    ->label('Parameter'),
                TextColumn::make('bobot5')->label('Bobot'),
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
                    ->url(fn (Indikator5 $record) => route('filament.admin.resources.indikator5-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator5s::route('/'),
            'create' => Pages\CreateIndikator5::route('/create'),
            'edit' => Pages\EditIndikator5::route('/{record}/edit'),
        ];
    }
}
