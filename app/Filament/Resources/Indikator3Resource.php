<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator3Resource\Pages;
use App\Filament\Resources\Indikator3Resource\RelationManagers;
use App\Models\Indikator3;
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

class Indikator3Resource extends Resource
{
    protected static ?string $model = Indikator3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama3_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter3')
                        ->options([
                            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)',
                            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2',
                            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot3 = match ($state) {
                                'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)' => 2,
                                'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 4,
                                'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3' => 6,
                                default => 0,
                            };
                            $set('bobot3', $bobot3); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot3')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot3')) 
                        ->required(),
                    
                    Select::make('inovasi3_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi3_id') 
                                ? request()->query('inovasi3_id') 
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
                    ->getStateUsing(fn () => '<p>Dukungan Anggaran</p>')
                    ->html()
                    ->searchable(false)  // Memastikan kolom ini tidak dicari
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Dukungan belanja yang mendukung penerapan</p><p> inovasi pada program/ kegiatan organisasi</p><p> pelaksana inovasi</p>')
                    ->html(),
                    TextColumn::make('parameter3')
                    ->label('Parameter'),
                TextColumn::make('bobot3')->label('Bobot'),
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
                    ->url(fn (Indikator1 $record) => route('filament.admin.resources.indikator3-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator3s::route('/'),
            'create' => Pages\CreateIndikator3::route('/create'),
            'edit' => Pages\EditIndikator3::route('/{record}/edit'),
        ];
    }
}
