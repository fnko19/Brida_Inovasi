<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inovasi_daerah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\InovasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class InovasiController extends Controller
{
    public function generateNomorRegistrasi($id)
{
    // Ambil tahun saat ini
    $tahun = Carbon::now()->year;  // Menggunakan Carbon untuk mendapatkan tahun saat ini
    
    // Membuat nomor registrasi dengan format: BKM-{Tahun}-{ID}
    $nomor_registrasi = 'BKM-' . $tahun . '-' . str_pad($id, 3, '0', STR_PAD_LEFT);

    return $nomor_registrasi;
}

//     public function generateNomorRegistrasi()
// {
//     // Ambil ID terakhir yang telah disimpan di database
//     $lastInovasi = inovasi_daerah::latest()->first(); // Mendapatkan data inovasi terakhir yang sudah ada

//     // Tentukan ID untuk nomor registrasi (ID baru berdasarkan auto-increment)
//     $urutan = $lastInovasi ? $lastInovasi->id + 1 : 1;  // Jika belum ada data, urutan mulai dari 1

//     // Ambil tahun saat ini
//     $tahun = Carbon::now()->year;  // Menggunakan Carbon untuk mendapatkan tahun saat ini
    
//     // Membuat nomor registrasi dengan format: BKM-{Tahun}-{ID}
//     $nomor_registrasi = 'BKM-' . $tahun . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

//     return $nomor_registrasi;
// }

    public function downloadPdf($id)
    {
        $inovasi = inovasi_daerah::findOrFail($id);
        $indikator = inovasi_daerah::with(['indikatorSatu', 'indikatorDua', 'indikatorTiga', 'indikatorEmpat', 'indikatorLima', 'indikatorEnam', 'indikatorTujuh', 'indikatorDelapan', 'indikatorSembilan', 'indikatorSepuluh'])->findOrFail($id);

        $tahapanInovasiOptions = [
            'inisiatif' => 'Inisiatif',
            'uji_coba' => 'Uji Coba',
            'penerapan' => 'Penerapan',
        ];

        $inisiatorInovasiOptions = [
            'kepala_daerah' => 'Kepala Daerah',
            'anggota_dprd' => 'Anggota DPRD',
            'opd' => 'OPD',
            'asn' => 'ASN',
            'masyarakat' => 'Masyarakat',
        ];

        $jenisInovasiOptions = [
            '1' => 'Digital',
            '2' => 'Non Digital',
        ];

        $bentukInovasiOptions = [
            'daerah' => 'Inovasi Daerah Lainnya sesuai dengan Urusan Pemerintah yang menjadi kewenangan Daerah',
            'layanan' => 'Inovasi Pelayanan Publik',
            'tata_kelola' => 'Inovasi Tata Kelola Pemerintahan Daerah ',
        ];

        $tematikInovasiOptions = [
            '1' => 'Digitalisasi Layanan Pemerintahan',
            '2' => 'Penanggulangan Kemiskinan',
            '3' => 'Kemudahan Investasi',
            '4' => 'Prioritas Aktual Presiden',
            '5' => 'Non Tematik',
        ];

        $jenisInovasiOptions = [
            '1' => 'Digital',
            '2' => 'Non Digital',
        ];

        $priotitasInovasiOptions = [
            '1' => 'Prioritas',
            '2' => 'Bukan Prioritas',
        ];

        $berkembangInovasiOptions = [
            '1' => 'Tidak', 
            '2' => 'Ya', 
        ];

        $misiInovasiOptions = [
            '1' => 'Mewujudkan tata kelola pemerintahan yang cerdas, bersih terpercaya',
            '2' => 'Meningkatkan kualitas layanan dasar bidang pendidikan dan kesehatan secara merata',
            '3' => 'Memperluas kesempatan kerja, mendorong kewirausahaan dan industri ekonomi kreatif',
            '4' => 'Mewujudkan infrastruktur serta tata ruang kota yang berkelanjutan dan berkeadilan',
            '5' => 'Perlindungan dan peningkatan kapasitas perempuan, anak, dan difabel',
            '6' => 'Membangun pusat inovasi kepemudaan, olahraga, seni dan budaya',
            '7' => 'Menegakkan ketertiban umum dan pemberian layanan hukum bagi kelompok rentan',
            '8' => 'Mewujudkan kota yang tangguh terhadap bencana dan perubahan iklim serta meningkatkan kesejahteraan masyarakat pesisir dan pulau',
        ];

        $urusanUtamaInovasiOptions = [
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
        ];

        // Menambahkan opsi urusan_irisan
    $urusanIrisanOptions = [
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
    ];

    // Mengambil urusan_iris yang sudah dipilih dan mengubahnya menjadi string
        //$urusanIrisan = implode(', ', array_intersect_key($urusanIrisanOptions, array_flip($inovasi->urusan_irisan)));

        $indikatorData = [
            [
                'no' => 1,
                'indikator' => 'Regulasi Inovasi Daerah',
                'informasi' => $indikator->indikatorSatu->first()?->parameter ?? '-',
                'bukti_dukung' => $inovasi->indikatorSatu->flatMap(function ($indikator) {
                    return $indikator->dokumenSatu->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 2,
                'indikator' => 'Ketersediaan SDM Terhadap Inovasi Daerah',
                'informasi' => $indikator->indikatorDua->first()?->parameter2 ?? '-',
                'bukti_dukung' => $inovasi->indikatorDua->flatMap(function ($indikator) {
                    return $indikator->dokumenDua->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 3,
                'indikator' => 'Dukungan Anggaran',
                'informasi' => $indikator->indikatorTiga->first()?->parameter3 ?? '-',
                'bukti_dukung' => $inovasi->indikatorTiga->flatMap(function ($indikator) {
                    return $indikator->dokumenTiga->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 4,
                'indikator' => 'Alat Kerja',
                'informasi' => $indikator->indikatorEmpat->first()?->parameter4 ?? '-',
                'bukti_dukung' => $inovasi->indikatorEmpat->flatMap(function ($indikator) {
                    return $indikator->dokumenEmpat->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 5,
                'indikator' => 'Bimtek Inovasi',
                'informasi' => $indikator->indikatorLima->first()?->parameter5 ?? '-',
                'bukti_dukung' => $inovasi->indikatorLima->flatMap(function ($indikator) {
                    return $indikator->dokumenLima->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 6,
                'indikator' => 'Integrasi Program Dan Kegiatan Inovasi Dalam RKPD',
                'informasi' => $indikator->indikatorEnam->first()?->parameter6 ?? '-',
                'bukti_dukung' => $inovasi->indikatorEnam->flatMap(function ($indikator) {
                    return $indikator->dokumenEnam->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 7,
                'indikator' => 'Keterlibatan aktor inovasi',
                'informasi' => $indikator->indikatorTujuh->first()?->parameter7 ?? '-',
                'bukti_dukung' => $inovasi->indikatorTujuh->flatMap(function ($indikator) {
                    return $indikator->dokumenTujuh->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 8,
                'indikator' => 'Pelaksana Inovasi Daerah',
                'informasi' => $indikator->indikatorDelapan->first()?->parameter8 ?? '-',
                'bukti_dukung' => $inovasi->indikatorDelapan->flatMap(function ($indikator) {
                    return $indikator->dokumenDelapan->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 9,
                'indikator' => 'Jejaring Inovasi',
                'informasi' => $indikator->indikatorSembilan->first()?->parameter9 ?? '-',
                'bukti_dukung' => $inovasi->indikatorSembilan->flatMap(function ($indikator) {
                    return $indikator->dokumenSembilan->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 10,
                'indikator' => 'Sosialisasi Inovasi Daerah',
                'informasi' => $indikator->indikatorSepuluh->first()?->parameter10 ?? '-',
                'bukti_dukung' => $inovasi->indikatorSepuluh->flatMap(function ($indikator) {
                    return $indikator->dokumenSepuluh->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 11,
                'indikator' => 'Pedoman Teknis',
                'informasi' => $indikator->indikatorSebelas->first()?->parameter11 ?? '-',
                'bukti_dukung' => $inovasi->indikatorSebelas->flatMap(function ($indikator) {
                    return $indikator->dokumenSebelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 12,
                'indikator' => 'Kemudahan Informasi Layanan',
                'informasi' => $indikator->indikatorDuabelas->first()?->parameter12 ?? '-',
                'bukti_dukung' => $inovasi->indikatorDuabelas->flatMap(function ($indikator) {
                    return $indikator->dokumenDuabelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 13,
                'indikator' => 'Kemudahan proses inovasi yang dihasilkan',
                'informasi' => $indikator->indikatorTigabelas->first()?->parameter13 ?? '-',
                'bukti_dukung' => $inovasi->indikatorTigabelas->flatMap(function ($indikator) {
                    return $indikator->dokumenTigabelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 14,
                'indikator' => 'Penyelesaian Layanan Pengaduan',
                'informasi' => $indikator->indikatorEmpatbelas->first()?->parameter14 ?? '-',
                'bukti_dukung' => $inovasi->indikatorEmpatbelas->flatMap(function ($indikator) {
                    return $indikator->dokumenEmpatbelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 15,
                'indikator' => 'Layanan Terintegrasi',
                'informasi' => $indikator->indikatorLimabelas->first()?->parameter15 ?? '-',
                'bukti_dukung' => $inovasi->indikatorLimabelas->flatMap(function ($indikator) {
                    return $indikator->dokumenLimabelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 16,
                'indikator' => 'Replikasi',
                'informasi' => $indikator->indikatorEnambelas->first()?->parameter16 ?? '-',
                'bukti_dukung' => $inovasi->indikatorEnambelas->flatMap(function ($indikator) {
                    return $indikator->dokumenEnambelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 17,
                'indikator' => 'Kecepatan penciptaan inovasi',
                'informasi' => $indikator->indikatorTujuhbelas->first()?->parameter17 ?? '-',
                'bukti_dukung' => $inovasi->indikatorTujuhbelas->flatMap(function ($indikator) {
                    return $indikator->dokumenTujuhbelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 18,
                'indikator' => 'Kemanfaatan Inovasi ',
                'informasi' => $indikator->indikatorDelapanbelas->first()?->parameter18 ?? '-',
                'bukti_dukung' => $inovasi->indikatorDelapanbelas->flatMap(function ($indikator) {
                    return $indikator->dokumenDelapanbelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 19,
                'indikator' => 'Monitoring dan Evaluasi Inovasi Daerah',
                'informasi' => $indikator->indikatorSembilanbelas->first()?->parameter19 ?? '-',
                'bukti_dukung' => $inovasi->indikatorSembilanbelas->flatMap(function ($indikator) {
                    return $indikator->dokumenSembilanbelas->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
            [
                'no' => 20,
                'indikator' => 'Kualitas Inovasi Daerah',
                'informasi' => $indikator->indikatorDuapuluh->first()?->parameter20 ?? '-',
                'bukti_dukung' => $inovasi->indikatorDuapuluh->flatMap(function ($indikator) {
                    return $indikator->dokumenDuapuluh->pluck('tentang'); 
                })->implode(', ') ?? 'Tidak Tersedia',
            ],
        ];

        $pdf = Pdf::loadView('pdf.custom-header', [
            'nama_inovasi' => $inovasi->nama_inovasi,
            'nomor_registrasi' => $this->generateNomorRegistrasi($inovasi->id),
            'dibuat_oleh' => $inovasi->dibuat_oleh,
            'tahapan_inovasi' => $tahapanInovasiOptions[$inovasi->tahapan_inovasi] ?? 'Tidak Diketahui', //$inovasi->tahapan_inovasi,
            'inisiator' => $inisiatorInovasiOptions[$inovasi->inisiator] ?? 'Tidak Diketahui',//$inovasi->inisiator,
            'nama_inisiator' => $inovasi->nama_inisiator,
            'jenis_inovasi' => $jenisInovasiOptions[$inovasi->jenis_inovasi] ?? 'Tidak Diketahui',//$inovasi->jenis_inovasi,
            'bentuk_inovasi' => $bentukInovasiOptions[$inovasi->bentuk_inovasi] ?? 'Tidak Diketahui',
            'tematik' => $tematikInovasiOptions[$inovasi->tematik] ?? 'Tidak Diketahui',
            'prioritas' => $priotitasInovasiOptions[$inovasi->prioritas] ?? 'Tidak Diketahui',
            'misi' => $misiInovasiOptions[$inovasi->misi] ?? 'Tidak Diketahui',
            'urusan_utama' => $urusanUtamaInovasiOptions[$inovasi->urusan_utama] ?? 'Tidak Diketahui',
            //'urusan_irisan' => $inovasi->urusan_irisan,
            'waktu_uji' => $inovasi->waktu_uji,
            'waktu_penerapan' => $inovasi->waktu_penerapan,
            'berkembang' => $berkembangInovasiOptions[$inovasi->berkembang] ?? 'Tidak Diketahui',
            'dasar_hukum' => $inovasi->dasar_hukum,
            'masalah' => $inovasi->masalah,
            // 'isu_strategis' => $inovasi->isu_strategis,
            'metode_baru' => $inovasi->metode_baru,
            'keunggulan' => $inovasi->keunggulan,
            'spesifikasi_inovasi' => $inovasi->spesifikasi_inovasi,
            // 'tujuan' => $inovasi->tujuan,
            'manfaat' => $inovasi->manfaat,
            'skor_kematangan' => $inovasi->skor_kematangan,
            'hasil_inovasi_sebelum' => $inovasi->hasil_inovasi_sebelum,
            'hasil_inovasi_setelah' => $inovasi->hasil_inovasi_setelah,
            'isu_global' => $inovasi->isu_global,
            'isu_nasional' => $inovasi->isu_nasional,
            'isu_lokal' => $inovasi->isu_lokal,
            'tujuan_pendek' => $inovasi->tujuan_pendek,
            'tujuan_menengah' => $inovasi->tujuan_menengah,
            'tujuan_panjang' => $inovasi->tujuan_panjang,
            'indikatorData' => $indikatorData,
        ]);

        // Load view PDF dengan data
       // $pdf = Pdf::loadView('pdf.custom-header', $data);

        // Download PDF dengan nama file khusus
        return $pdf->download('laporan-inovasi-'.$inovasi->id.'.pdf');
    }

    public function exportExcel($id)
    {
        return Excel::download(new InovasiExport($id), 'laporan-inovasi.xlsx');
    }
}
