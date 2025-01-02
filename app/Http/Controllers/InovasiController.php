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
        $indikator = inovasi_daerah::with(['indikatorSatu', 'indikatorDua'])->findOrFail($id);

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
        $urusanIrisan = implode(', ', array_intersect_key($urusanIrisanOptions, array_flip($inovasi->urusan_irisan)));

        $indikatorData = [
            [
                'no' => 1,
                'indikator' => 'Regulasi Inovasi Daerah',
                'informasi' => $indikator->indikatorSatu->first()?->parameter ?? 'Tidak Tersedia',
                // 'informasi' => $indikator->indikatorSatu->pluck('parameter') ?: 'Tidak Tersedia',
                // 'bukti_dukung' => $inovasi->indikatorSatu->bukti_dukung ?? 'Tidak Tersedia',
            ],
            [
                'no' => 2,
                'indikator' => 'Ketersediaan SDM Terhadap Inovasi Daerah',
                'informasi' => $indikator->indikatorDua->first()?->parameter2 ?? 'Tidak Tersedia',
                // 'informasi' => $indikator->indikatorDua->pluck('parameter') ?: 'Tidak Tersedia',
                // 'bukti_dukung' => $inovasi->indikatorDua->bukti_dukung ?? 'Tidak Tersedia',
            ],
            [
                'no' => 3,
                'indikator' => 'Dukungan Anggaran',
                'informasi' => $indikator->indikatorTiga->first()?->parameter3a ?? 'Tidak Tersedia',
                // 'informasi' => $indikator->indikatorDua->pluck('parameter') ?: 'Tidak Tersedia',
                // 'bukti_dukung' => $inovasi->indikatorDua->bukti_dukung ?? 'Tidak Tersedia',
            ],
        ];

        $pdf = Pdf::loadView('pdf.custom-header', [
            'nama_inovasi' => $inovasi->nama_inovasi,
            'nomor_registrasi' => $this->generateNomorRegistrasi($inovasi->id),
            'dibuat_oleh' => $inovasi->dibuat_oleh,
            'tahapan_inovasi' => $tahapanInovasiOptions[$inovasi->tahapan_inovasi] ?? 'Tidak Diketahui', //$inovasi->tahapan_inovasi,
            'inisiator' => $inisiatorInovasiOptions[$inovasi->inisiator] ?? 'Tidak Diketahui',//$inovasi->inisiator,
            'nama_inisiator' => $inovasi->nama_inisiator,
            'jenis_inovasi' => $inovasi->jenis_inovasi,
            'bentuk_inovasi' => $inovasi->bentuk_inovasi,
            'tematik' => $inovasi->tematik,
            'prioritas' => $inovasi->prioritas,
            'misi' => $inovasi->misi,
            'urusan_utama' => $inovasi->urusan_utama,
            'urusan_irisan' => $inovasi->urusan_irisan,
            'waktu_uji' => $inovasi->waktu_uji,
            'waktu_penerapan' => $inovasi->waktu_penerapan,
            'berkembang' => $inovasi->berkembang,
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
