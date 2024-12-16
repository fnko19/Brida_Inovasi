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
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InovasiDaerahResource extends Resource
{
    protected static ?string $model = inovasi_daerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Inovasi Daerah';

    protected static ?string $navigationGroup = 'Database Inovasi Daerah';

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
                        ->label('Program Prioritas')
                        ->options([
                            '1' => 'Prioritas',
                            '2' => 'Bukan Prioritas',
                        ])
                        ->required()
                        ->inline(),
                    Select::make('misi')
                        ->label('Misi Beririsan')
                        ->options([
                            '1' => 'Memajukan layanan pendidikan, kesehatan, sosial keagamaan, dan kemasyarakatan berbasis kompetensi, berakhlak, dan berkearifan lokal',
                            '2' => 'Melanjutkan hilirisasi pertanian untuk mencapai Swasembada Pangan dan lumbung pangan, serta sumber daya alam lainnya yang modern dan berdaya saing, berbasis ekonomi hijau dan ekonomi biru',
                            '3' => 'Mengembangkan ekonomi masyarakat, pedesaan, dan daerah 3t (terluar, termiskin, tertinggal) untuk menekan angka pengangguran, kemiskinan, serta menangani gizi buruk dan stunting',
                            '4' => 'Mengembangkan desa mandiri sebagai pusat pertumbuhan untuk pemerataan ekonomi dan pemberantasan kemiskinan',
                            '5' => 'Mendorong investasi padat karya dan berwawasan lingkungan',
                            '6' => 'Mempercepat dan memperkuat transformasi digital dan birokrasi yang berintegritas, adaptif, dan melayani',
                            '7' => 'Memperkuat peran kepemudaan dalam pembangunan serta pelibatan kelompok marjinal, termasuk penyandang disabilitas',
                            '8' => 'Memperkuat layanan transportasi (darat, laut, udara) dan infrastruktur yang berorientasi pada kesiapan dan ketahanan menghadapi situasi bencana, berkeadilan, serta pengembangan pariwisata untuk mendukung akselerasi pertumbuhan ekonomi',
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
                    Placeholder::make('note1')
                        ->label('Rancang Bangun'),
                    Textarea::make('dasar_hukum')
                        ->label('Dasar Hukum')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('masalah')
                        ->label('Permasalahan')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('isu_strategis')
                        ->label('Isu Strategis')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('metode_baru')
                        ->label('Metode Pembaharuan')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('keunggulan')
                        ->label('Keunggulan dan Kebaharuan')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('spesifikasi_inovasi')
                        ->label('Tahapan Inovasi/Spesifikasi Inovasi')
                        ->required()
                        ->rows(5)
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ]),
                    Textarea::make('tujuan')
                        ->label('Tujuan Inovasi')
                        ->required()
                        ->helperText('Minimal 300 kata')
                        ->rules([
                            'required',
                            function ($attribute, $value, $fail) {
                                $wordCount = str_word_count(strip_tags($value));
                                if ($wordCount < 300) {
                                    $fail('Harus memiliki minimal 300 kata. Saat ini hanya ada ' . $wordCount . ' kata.');
                                }
                            }
                        ])
                        ->rows(5),
                    Textarea::make('manfaat')
                        ->label('Manfaat Inovasi')
                        ->required()
                        ->rows(5),
                    FileUpload::make('anggaran')
                        ->label('Anggaran (Jika Ada')
                        ->directory('uploads')
                        ->disk('local')
                        ->maxSize(2048)
                        ->helperText('*) Dokumen PDF, Maksimal 2MB'),
                    FileUpload::make('profil_bisnis')
                        ->label('Profil Bisnis (.ppt) (Jika ada)')
                        ->directory('uploads')
                        ->disk('local')
                        ->maxSize(2048)
                        ->helperText('*) Dokumen PDF, Maksimal 2MB'),
                    FileUpload::make('doc_HAKI')
                        ->label('Dokumen HAKI')
                        ->directory('uploads')
                        ->disk('local')
                        ->maxSize(2048)
                        ->helperText('*) Dokumen PDF, Maksimal 2MB'),
                    FileUpload::make('penghargaan')
                        ->label('penghargaan')
                        ->directory('uploads')
                        ->disk('local')
                        ->maxSize(2048)
                        ->helperText('*) Dokumen PDF, Maksimal 2MB'),
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
                    ->sortable(),
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
