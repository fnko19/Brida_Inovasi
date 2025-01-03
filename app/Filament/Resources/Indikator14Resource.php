<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator14Resource\Pages;
use App\Filament\Resources\Indikator14Resource\RelationManagers;
use App\Models\Indikator14;
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

class Indikator14Resource extends Resource
{
    protected static ?string $model = Indikator14::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama14_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter14')
                        ->label('Parameter')
                        ->options([
                           'Kurang dari sama dengan 50% atau Tidak ada pengaduan' => 'Kurang dari sama dengan 50% atau Tidak ada pengaduan',
                            '51% s.d 86%' => '51% s.d 86%',
                            'lebih dari sama dengan 86%' => 'lebih dari sama dengan 86%',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot14 = match ($state) {
                            'Kurang dari sama dengan 50% atau Tidak ada pengaduan' => 1,
                            '51% s.d 86%' => 2,
                            'lebih dari sama dengan 86%' => 3,

                                default => 0,
                            };
                            $set('bobot14', $bobot14); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot14')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot14')) 
                        ->required(),
                    
                    Select::make('inovasi14_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi14_id') 
                                ? request()->query('inovasi14_id') 
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
                ->getStateUsing(fn () => '<p>Penyelesaian Layanan Pengaduan</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Rasio pengaduan yang tertangani dalam tahun</p><p> terakhir, meliputi keluhan, kritik konstruktif,</p><p> saran, dan pengaduan lainnya terkait layanan inovasi.</p>')
                ->html(),
                TextColumn::make('parameter14')
                ->label('Parameter'),
            TextColumn::make('bobot14')->label('Bobot'),
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
                ->url(fn (Indikator14 $record) => route('filament.admin.resources.indikator14-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator14s::route('/'),
            'create' => Pages\CreateIndikator14::route('/create'),
            'edit' => Pages\EditIndikator14::route('/{record}/edit'),
        ];
    }
}
