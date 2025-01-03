<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator10Resource\Pages;
use App\Filament\Resources\Indikator10Resource\RelationManagers;
use App\Models\Indikator10;
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

class Indikator10Resource extends Resource
{
    protected static ?string $model = Indikator10::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama10_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter10')
                    ->label('Parameter')
                        ->options([
                            'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb' => 'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb',
                            'Konten melalui media sosial' => 'Konten melalui media sosial',
                            'Media berita' => 'Media berita',

                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot10 = match ($state) {
                                'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb'  => 1,
                                'Konten melalui media sosial' => 2,
                                'Media berita' => 3,
                                default => 0,
                            };
                            $set('bobot10', $bobot10); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot10')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot10')) 
                        ->required(),
                    
                    Select::make('inovasi10_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi10_id') 
                                ? request()->query('inovasi10_id') 
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
                    ->getStateUsing(fn () => '<p>Sosialisasi Inovasi Daerah</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Penyebarluasan informasi dan/atau advokasi</p><p> kebijakan inovasi daerah (2 Tahun Terakhir)</p>')
                    ->html(),
                    TextColumn::make('parameter10')
                    ->label('Parameter'),
                TextColumn::make('bobot10')->label('Bobot'),
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
                    ->url(fn (Indikator10 $record) => route('filament.admin.resources.indikator10-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator10s::route('/'),
            'create' => Pages\CreateIndikator10::route('/create'),
            'edit' => Pages\EditIndikator10::route('/{record}/edit'),
        ];
    }
}
