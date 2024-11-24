<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InovasiDaerahResource\Pages;
use App\Filament\Resources\InovasiDaerahResource\RelationManagers;
use App\Models\inovasi_daerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InovasiDaerahResource extends Resource
{
    protected static ?string $model = inovasi_daerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Inovasi Pemerintah Daerah';

    protected static ?string $navigationGroup = 'Lomba Inovasi Daerah';

    public static ?string $label = 'Inovasi Pemerintah Daerah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('dibuat_oleh')->label('Dibuat Oleh')->required(),
                    TextInput::make('nama_inovasi')->label('Nama Inovasi')->required(),
                    Radio::make('tahapan_inovasi')
                        ->label('Tahapan Inovasi')
                        ->options([
                            'inisiatif' => 'Inisiatif',
                            'uji_coba' => 'Uji Coba',
                            'penerapan' => 'Penerapan',
                        ])
                        ->required()
                        ->inline(),
                    Radio::make('inisiator')
                        ->label('Inisiator Inovasi Daerah')
                        ->options([
                            'kepala_daerah' => 'Kepala Daerah',
                            'anggota_dprd' => 'Anggota DPRD',
                            'opd' => 'OPD',
                            'asn' => 'ASN',
                            'masyarakat' => 'Masyarakat',
                        ])
                        ->required()
                        ->inline(),
                    TextInput::make('nama_inisiator')->label('Nama Inisiator')->required(),
                    Radio::make('jenis_inovasi')
                        ->label('Jenis Inovasi')
                        ->options([
                            '1' => 'Digital',
                            '2' => 'Non Digital',
                        ])
                        ->required()
                        ->inline(),
                    Select::make('bentuk_inovasi')
                        ->label('Bentuk Inovasi Daerah')
                        ->options([
                            'daerah' => 'Inovasi Daerah Lainnya sesuai dengan Urusan Pemerintah yang menjadi kewenangan Daerah',
                            'layanan' => 'Inovasi Pelayanan Publik',
                            'tata_kelola' => 'Inovasi Tata Kelola Pemerintahan Daerah ',
                        ])
                        ->required(),
                    Select::make('tematik')
                        ->label('Tematik')
                        ->options([
                            '1' => 'Digitalisasi Layanan Pemerintahan',
                            '2' => 'Penanggulangan Kemiskinan',
                            '3' => 'Kemudahan Investasi',
                            '4' => 'Prioritas Aktual Presiden',
                            '5' => 'Non Tematik',
                        ])
                        ->required(),
                    Radio::make('prioritas')
                        ->label('Prioritas')
                        ->options([
                            '1' => 'Prioritas',
                            '2' => 'Tidak Prioritas',
                        ])
                        ->required()
                        ->inline(),
                    Select::make('tematik')
                        ->label('Tematik')
                        ->options([
                            '1' => 'Digitalisasi Layanan Pemerintahan',
                            '2' => 'Penanggulangan Kemiskinan',
                            '3' => 'Kemudahan Investasi',
                            '4' => 'Prioritas Aktual Presiden',
                            '5' => 'Non Tematik',
                        ])
                        ->required(),
                    Placeholder::make('note')
                        ->label('Urusan Pemerintahan'),
                    Select::make('urusan_utama')
                        ->label('Urusan Utama')
                        ->options([
                            '1' => 'Pendidikan',
                            '2' => 'Kesehatan',
                            '3' => 'Pekerjaan Umum dan Penataan Ruang',
                            '4' => 'Perumahan Rakyat dan Kawasan Pemukiman',
                            '5' => 'Ketentraman, Ketertiban Umum, dan Perlindungan Masyarakat',
                            '6' => 'Sosial', 
                            '7' => 'Tenaga Kerja', 
                            '8' => 'Pemberdayaan Perempuan dan Perlindungan Anak', 
                            '9' => 'Pangan', 
                            '10' => 'Pertahanan',
                            '11' => 'Lingkungan Hidup', 
                            '12' => 'Administrasi Kependudukan dan Pencatatan Sipil', 
                            '13' => 'Pemberdayaan Masyarakat dan Desa', 
                            '14' => 'Pengendalian Penduduk dan Keluarga Berencana', 
                            '15' => 'Perhubungan', 
                            '16' => 'Komunikasi dan Informatika', 
                            '17' => 'Koperasi, Usaha Kecil dan Menengah', 
                            '18' => 'Penanaman Modal', 
                            '19' => 'Kepemudaan dan Olahraga', 
                            '20' => 'Statistik',
                            '21' => 'Persandian', 
                            '22' => 'Kebudayaan', 
                            '23' => 'Perpustakaan', 
                            '24' => 'Kearsipan', 
                            '25' => 'Kelautan dan Perikanan', 
                            '26' => 'Pariwisata', 
                            '27' => 'Pertanian', 
                            '28' => 'Kehutanan', 
                            '29' => 'Energi dan Sumber Daya Mineral', 
                            '30' => 'Perdagangan',
                            '31' => 'Perindustrian', 
                            '32' => 'Transmigrasi', 
                            '33' => 'Perencanaan', 
                            '34' => 'Keuangan', 
                            '35' => 'Kepegawaian', 
                            '36' => 'Pendidikan dan Pelatihan', 
                            '37' => 'Penelitian dan Pengembangan', 
                            '38' => 'Fungsi lain sesuai dengan Ketentuan Peraturan Perundang-undangan',
                        ])
                        ->required(),
                    MultiSelect::make('urusan_irisan')
                        ->label('Urusan Lain yang Beririsan')
                        ->options([
                            '1' => 'Pendidikan',
                            '2' => 'Kesehatan',
                            '3' => 'Pekerjaan Umum dan Penataan Ruang',
                            '4' => 'Perumahan Rakyat dan Kawasan Pemukiman',
                            '5' => 'Ketentraman, Ketertiban Umum, dan Perlindungan Masyarakat',
                            '6' => 'Sosial', 
                            '7' => 'Tenaga Kerja', 
                            '8' => 'Pemberdayaan Perempuan dan Perlindungan Anak', 
                            '9' => 'Pangan', 
                            '10' => 'Pertahanan',
                            '11' => 'Lingkungan Hidup', 
                            '12' => 'Administrasi Kependudukan dan Pencatatan Sipil', 
                            '13' => 'Pemberdayaan Masyarakat dan Desa', 
                            '14' => 'Pengendalian Penduduk dan Keluarga Berencana', 
                            '15' => 'Perhubungan', 
                            '16' => 'Komunikasi dan Informatika', 
                            '17' => 'Koperasi, Usaha Kecil dan Menengah', 
                            '18' => 'Penanaman Modal', 
                            '19' => 'Kepemudaan dan Olahraga', 
                            '20' => 'Statistik',
                            '21' => 'Persandian', 
                            '22' => 'Kebudayaan', 
                            '23' => 'Perpustakaan', 
                            '24' => 'Kearsipan', 
                            '25' => 'Kelautan dan Perikanan', 
                            '26' => 'Pariwisata', 
                            '27' => 'Pertanian', 
                            '28' => 'Kehutanan', 
                            '29' => 'Energi dan Sumber Daya Mineral', 
                            '30' => 'Perdagangan',
                            '31' => 'Perindustrian', 
                            '32' => 'Transmigrasi', 
                            '33' => 'Perencanaan', 
                            '34' => 'Keuangan', 
                            '35' => 'Kepegawaian', 
                            '36' => 'Pendidikan dan Pelatihan', 
                            '37' => 'Penelitian dan Pengembangan', 
                            '38' => 'Fungsi lain sesuai dengan Ketentuan Peraturan Perundang-undangan',
                        ])
                        ->required(),
                    DatePicker::make('waktu_uji')
                        ->label('Waktu Uji Coba Inovasi Daerah')
                        ->required(),
                    DatePicker::make('waktu_penerapan')
                        ->label('Waktu Penerapan Inovasi Daerah')
                        ->required(),
                    Select::make('berkembang')
                        ->label('Apakah sudah ada perkembangan inovasi tersebut?')
                        ->options([
                            '1' => 'Tidak', 
                            '2' => 'Ya', 
                        ])
                        ->required(),
                    Textarea::make('rancang_bangun')
                        ->label('Rancang Bangun Inovasi')
                        ->required()
                        ->rows(5), 
                    Textarea::make('tujuan')
                        ->label('Tujuan Inovasi')
                        ->required()
                        ->rows(5),
                    Textarea::make('manfaat')
                        ->label('Manfaat Inovasi')
                        ->required()
                        ->rows(5),
                    

                    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No'),
                TextColumn::make('dibuat_oleh')->label('Dibuat Oleh'),
                TextColumn::make('nama_inovasi')->label('Nama Inovasi')->sortable()->searchable(),
                TextColumn::make('tahapan_inovasi')
                    ->label('Tahapan Inovasi')
                    ->formatStateUsing(fn ($state) => match ($state){
                        'inisiatif' => 'Inisiatif',
                        'uji_coba' => 'Uji Coba',
                        'penerapan' => 'Penerapan',
                    }),
                TextColumn::make('urusan_utama')
                    ->label('Urusan Pemerintahan Utama')
                    ->formatStateUsing(fn ($state) => match ($state){
                        '1' => 'Pendidikan',
                        '2' => 'Kesehatan',
                        '3' => 'Pekerjaan Umum dan Penataan Ruang',
                        '4' => 'Perumahan Rakyat dan Kawasan Pemukiman',
                        '5' => 'Ketentraman, Ketertiban Umum, dan Perlindungan Masyarakat',
                        '6' => 'Sosial', 
                        '7' => 'Tenaga Kerja', 
                        '8' => 'Pemberdayaan Perempuan dan Perlindungan Anak', 
                        '9' => 'Pangan', 
                        '10' => 'Pertahanan',
                        '11' => 'Lingkungan Hidup', 
                        '12' => 'Administrasi Kependudukan dan Pencatatan Sipil', 
                        '13' => 'Pemberdayaan Masyarakat dan Desa', 
                        '14' => 'Pengendalian Penduduk dan Keluarga Berencana', 
                        '15' => 'Perhubungan', 
                        '16' => 'Komunikasi dan Informatika', 
                        '17' => 'Koperasi, Usaha Kecil dan Menengah', 
                        '18' => 'Penanaman Modal', 
                        '19' => 'Kepemudaan dan Olahraga', 
                        '20' => 'Statistik',
                        '21' => 'Persandian', 
                        '22' => 'Kebudayaan', 
                        '23' => 'Perpustakaan', 
                        '24' => 'Kearsipan', 
                        '25' => 'Kelautan dan Perikanan', 
                        '26' => 'Pariwisata', 
                        '27' => 'Pertanian', 
                        '28' => 'Kehutanan', 
                        '29' => 'Energi dan Sumber Daya Mineral', 
                        '30' => 'Perdagangan',
                        '31' => 'Perindustrian', 
                        '32' => 'Transmigrasi', 
                        '33' => 'Perencanaan', 
                        '34' => 'Keuangan', 
                        '35' => 'Kepegawaian', 
                        '36' => 'Pendidikan dan Pelatihan', 
                        '37' => 'Penelitian dan Pengembangan', 
                        '38' => 'Fungsi lain sesuai dengan Ketentuan Peraturan Perundang-undangan',
                    }),
                TextColumn::make('waktu_uji')
                    ->label('Waktu Uji Coba Inovasi Daerah')
                    ->dateTime('d M Y') 
                    ->sortable(),
                TextColumn::make('waktu_penerapan')
                    ->label('Waktu Penerapan Inovasi Daerah')
                    ->dateTime('d M Y') // Format tanggal
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListInovasiDaerahs::route('/'),
            'create' => Pages\CreateInovasiDaerah::route('/create'),
            'edit' => Pages\EditInovasiDaerah::route('/{record}/edit'),
        ];
    }
}
