<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator18Resource\Pages;
use App\Filament\Resources\Indikator18Resource\RelationManagers;
use App\Models\Indikator18;
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

class Indikator18Resource extends Resource
{
    protected static ?string $model = Indikator18::class;

    protected static ?string $navigationGroup = 'Data Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama18_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                        Select::make('pilihParam18')
                        ->options([
                            'Satuan orang (pegawai, peserta didik, pasien, dsb' => 'Satuan orang (pegawai, peserta didik, pasien, dsb)',
                            'Satuan unit (opd/uptd/rt/rw/kampung/KK, dsb' => 'Satuan unit (opd/uptd/rt/rw/kampung/KK, dsb)',
                            'Satuan biaya (rupiah)' => 'Satuan biaya (rupiah)',
                            'Satuan pendapatan (rupiah)' => 'Satuan pendapatan (rupiah)',
                            'Satuan hasil produk/satuan penjualan' => 'Satuan hasil produk/satuan penjualan',
                        ])
                        ->required()
                        ->reactive(),
                    Select::make('parameter18')
                        ->label('Parameter')
                        ->options([
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Jumlah pengguna atau penerima manfaat 1-100 orang' => 'Jumlah pengguna atau penerima manfaat 1-100 orang',
                            'Jumlah pengguna atau penerima manfaat 101-200 orang' => 'Jumlah pengguna atau penerima manfaat 101-200 orang',
                            'Jumlah pengguna atau penerima manfaat 201 orang atau lebih' => 'Jumlah pengguna atau penerima manfaat 201 orang atau lebih',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot18 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Jumlah pengguna atau penerima manfaat 1-100 orang' => 3,
                            'Jumlah pengguna atau penerima manfaat 101-200 orang' => 6,
                            'Jumlah pengguna atau penerima manfaat 201 orang atau lebih' => 9,
                            default => 0,
                            };
                            $set('bobot18', $bobot18); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('pilihParam18') !== 'Satuan orang (pegawai, peserta didik, pasien, dsb'),
                    Select::make('parameter18')
                        ->label('Parameter')
                        ->options([
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Persentase peningkatan jumlah unit 5,00% - 20,00%' => 'Persentase peningkatan jumlah unit 5,00% - 20,00%',
                            'Persentase peningkatan jumlah unit 20,01% - 50,00%' => 'Persentase peningkatan jumlah unit 20,01% - 50,00%',
                            'Persentase peningkatan jumlah unit > 50%' => 'Persentase peningkatan jumlah unit > 50%',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot18 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Persentase peningkatan jumlah unit 5,00% - 20,00%' => 3,
                            'Persentase peningkatan jumlah unit 20,01% - 50,00%' => 6,
                            'Persentase peningkatan jumlah unit > 50%' => 9,
                            default => 0,
                            };
                            $set('bobot18', $bobot18); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('pilihParam18') !== 'Satuan unit (opd/uptd/rt/rw/kampung/KK, dsb'),

                    Select::make('parameter18')
                        ->label('Parameter')
                        ->options([
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Efisiensi belanja sebesar 0,01% - 10,00%' => 'Efisiensi belanja sebesar 0,01% - 10,00%',
                            'Efisiensi belanja sebesar 10,01% - 20,00%' => 'Efisiensi belanja sebesar 10,01% - 20,00%',
                            'Efisiensi belanja sebesar 20,01% - 30,00%' => 'Efisiensi belanja sebesar 20,01% - 30,00%',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot18 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Efisiensi belanja sebesar 0,01% - 10,00%' => 3,
                            'Efisiensi belanja sebesar 10,01% - 20,00%' => 6,
                            'Efisiensi belanja sebesar 20,01% - 30,00%' => 9,
                            default => 0,
                            };
                            $set('bobot18', $bobot18); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('pilihParam18') !== 'Satuan biaya (rupiah)'),

                    Select::make('parameter18')
                        ->label('Parameter')
                        ->options([
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%' => 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%',
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%' => 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%',
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%' => 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot18 = match ($state) {
                            'Tidak dapat diukur' => 0,
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%' => 3,
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%' => 6,
                            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%' => 9,
                            default => 0,
                            };
                            $set('bobot18', $bobot18); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('pilihParam18') !== 'Satuan pendapatan (rupiah)'),
                    
                    Select::make('parameter18')
                        ->label('Parameter')
                        ->options([
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang' => 'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang',
                            'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang' => 'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang',
                            'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang' => 'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot18 = match ($state) {
                            'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang' => 3,
                            'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang' => 6,
                            'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang' => 9,
                            default => 0,
                            };
                            $set('bobot18', $bobot18); 
                        })
                        ->nullable()
                        ->reactive()
                        ->hidden(fn (callable $get) => $get('pilihParam18') !== 'Satuan hasil produk/satuan penjualan'),
                    
                    TextInput::make('bobot18')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot18')) 
                        ->required(),
                    
                    Select::make('inovasi18_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi18_id') 
                                ? request()->query('inovasi18_id') 
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
                ->getStateUsing(fn () => '<p>Kemanfaatan Inovasi *</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('pilihParam18')
                ->label('Keterangan'),
            TextColumn::make('parameter18')
                ->label('Parameter'),
            TextColumn::make('bobot18')->label('Bobot'),
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
                ->url(fn (Indikator18 $record) => route('filament.admin.resources.indikator18-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator18s::route('/'),
            'create' => Pages\CreateIndikator18::route('/create'),
            'edit' => Pages\EditIndikator18::route('/{record}/edit'),
        ];
    }
}
