<?php

namespace App\Exports;

use App\Models\inovasi_daerah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InovasiExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $data = inovasi_daerah::where('id', $this->id)
            ->get([
                'nama_inovasi',
                'dibuat_oleh',
                'tahapan_inovasi',
                'inisiator',
                'nama_inisiator',
                'jenis_inovasi',
                'bentuk_inovasi',
                'tematik',
                'prioritas',
                'misi',
                'urusan_utama',
                'urusan_irisan',
                'waktu_uji',
                'waktu_penerapan',
                'berkembang',
                'dasar_hukum',
                'masalah',
                'isu_lokal',
                'isu_global',
                'isu_nasional',
                'metode_baru',
                'keunggulan',
                'spesifikasi_inovasi',
                'tujuan_pendek',
                'tujuan_menengah',
                'tujuan_panjang',
                'manfaat',
                'hasil_inovasi_sebelum',
                'hasil_inovasi_setelah',
            ]);
    
        return $data->map(function ($item) {
            return [
                'Nama Inovasi' => $item->nama_inovasi,
                'Dibuat oleh' => $item->dibuat_oleh,
                'Tahapan Inovasi' => $item->tahapan_inovasi,
                'Inisiator' => $item->inisiator,
                'Nama Inisiator' => $item->nama_inisiator,
                'Jenis Inovasi' => $this->getJenisInovasiLabel($item->jenis_inovasi),
                'Bentuk Inovasi' => $item->bentuk_inovasi,
                'Tematik' => $this->getTematikLabel($item->tematik),
                'Prioritas' => $this->getPrioritasLabel($item->prioritas),
                'Misi' => $this->getMisiLabel($item->misi),
                'Urusan Utama' => $this->getUrusanLabel($item->urusan_utama),
                'Urusan yang beririsan' => $this->getUrusanLabel($item->urusan_irisan),
                'Urusan yang beririsan' => $this->getUrusanLabel($item->urusan_irisan),
                'Waktu Uji' => $item->waktu_uji,
                'Waktu Penerapan' => $item->waktu_penerapan,
                'Apakah ada Perkembangan' => $this->getPerkembanganLabel($item->berkembang),
                'Dasar Hukum' => $item->dasar_hukum,
                'Masalah' => $item->masalah,
                'Isu Lokal' => $item->isu_lokal,
                'Isu Global' => $item->isu_global,
                'Isu Nasional' => $item->isu_nasional,
                'Metode Baru' => $item->metode_baru,
                'Keunggulan' => $item->keunggulan,
                'Spesifikasi Inovasi' => $item->spesifikasi_inovasi,
                'Tujuan Jangka Pendek' => $item->tujuan_pendek,
                'Tujuan Jangka Menengah' => $item->tujuan_menengah,
                'Tujuan Jangka Panjang' => $item->tujuan_panjang,
                'Manfaat' => $item->manfaat,
                'Hasil Sebelum Penerapan' => $item->hasil_inovasi_sebelum,
                'Hasil Setelah Penerapan' => $item->hasil_inovasi_setelah,
                ];
            });
    }

    // Judul kolom
    public function headings(): array
    {
        return [
            'Nama Inovasi', 
            'Dibuat Oleh', 
            'Tahapan Inovasi',
            'Inisiator',
            'Nama Inisiator',
            'Jenis Inovasi',
            'Bentuk Inovasi',
            'Tematik',
            'Program Prioritas',
            'Jenis Program Prioritas',
            'Urusan Utama',
            'Urusan Irisan',
            'Waktu Uji',
            'Waktu Penerapan',
            'Berkembang',
            'Dasar Hukum',
            'Masalah',
            'Isu Lokal',
            'Isu Global',
            'Isu Nasional',
            'Metode Baru',
            'Keunggulan',
            'Spesifikasi Inovasi',
            'Tujuan Pendek',
            'Tujuan Menengah', 
            'Tujuan Panjang', 
            'Manfaat',
            'Hasil Inovasi Sebelum',
            'Hasil Inovasi Setelah',
        ];
    }

    // Tambahkan garis pada tabel
    public function styles(Worksheet $sheet)
    {
        // Hitung kolom terakhir dan baris terakhir
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        // Terapkan gaya tebal untuk header
        $sheet->getStyle("A1:{$highestColumn}1")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Terapkan garis untuk seluruh tabel
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }

    /**
     * Function to get the label for Jenis Inovasi
     *
     * @param mixed $value
     * @return string
     */
    private function getJenisInovasiLabel($value)
    {
        $options = [
            '1' => 'Digital',
            '2' => 'Non Digital',
        ];

        return isset($options[$value]) ? $options[$value] : 'Unknown';
    }

    /**
     * Function to get the label for Tematik
     *
     * @param mixed $value
     * @return string
     */
    private function getTematikLabel($value)
    {
        $options = [
            '1' => 'Digitalisasi Layanan Pemerintahan',
            '2' => 'Penanggulangan Kemiskinan',
            '3' => 'Kemudahan Investasi',
            '4' => 'Prioritas Aktual Presiden',
            '5' => 'Non Tematik',
        ];

        return isset($options[$value]) ? $options[$value] : 'Unknown';
    }

    /**
     * Function to get the label for Prioritas
     *
     * @param mixed $value
     * @return string
     */
    private function getPrioritasLabel($value)
    {
        $options = [
            '1' => 'Prioritas',
            '2' => 'Bukan Prioritas',
        ];

        return isset($options[$value]) ? $options[$value] : 'Unknown';
    }

    /**
     * Function to get the label for Misi
     *
     * @param mixed $value
     * @return string
     */
    private function getMisiLabel($value)
    {
        $options = [
            '1' => 'Mewujudkan tata kelola pemerintahan yang cerdas, bersih terpercaya',
            '2' => 'Meningkatkan kualitas layanan dasar bidang pendidikan dan kesehatan secara merata',
            '3' => 'Memperluas kesempatan kerja, mendorong kewirausahaan dan industri ekonomi kreatif',
            '4' => 'Mewujudkan infrastruktur serta tata ruang kota yang berkelanjutan dan berkeadilan',
            '5' => 'Perlindungan dan peningkatan kapasitas perempuan, anak, dan difabel',
            '6' => 'Membangun pusat inovasi kepemudaan, olahraga, seni dan budaya',
            '7' => 'Menegakkan ketertiban umum dan pemberian layanan hukum bagi kelompok rentan',
            '8' => 'Mewujudkan kota yang tangguh terhadap bencana dan perubahan iklim serta meningkatkan kesejahteraan masyarakat pesisir dan pulau',
        ];

        return isset($options[$value]) ? $options[$value] : 'Unknown';
    }

    private function getUrusanLabel($value)
{
    $urusan = [
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

    // Check if $value is an array or string
    if (is_array($value)) {
        $value = implode(',', $value); // Convert array to a string if necessary
    }

    $values = explode(',', $value);

    $labels = [];

    foreach ($values as $val) {
        $val = trim($val); // Trim unnecessary spaces
        if (isset($urusan[$val])) {
            $labels[] = $urusan[$val];
        } else {
            $labels[] = 'Unknown'; // If value is not recognized
        }
    }

    return implode(', ', $labels); // Join the labels with commas

    }


    /**
     * Function to get the label for Perkembangan
     *
     * @param mixed $value
     * @return string
     */
    private function getPerkembanganLabel($value)
    {
        return $value == '1' ? 'Ada' : 'Tidak Ada';
    }


}
