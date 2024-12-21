<?php

namespace App\Exports;

use App\Models\inovasi_daerah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InovasiExport implements FromCollection, WithHeadings
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    // Data untuk setiap baris
    public function collection()
    {
        return inovasi_daerah::where('id', $this->id)
            ->get(['nama_inovasi', 'dibuat_oleh','tahapan_inovasi',
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
                'isu_strategis',
                'metode_baru',
                'keunggulan',
                'spesifikasi_inovasi',
                'tujuan',
                'manfaat',]);
    }

    // Judul kolom
    public function headings(): array
    {
        return ['Nama Inovasi', 'Dibuat Oleh', 'Tahapan Inovasi',
            'Inisiator',
            'Nama Inisiator',
            'Jenis Inovasi',
            'Bentuk Inovasi',
            'Tematik',
            'Prioritas',
            'Misi',
            'Urusan Utama',
            'Urusan Irisan',
            'Waktu Uji',
            'Waktu Penerapan',
            'Berkembang',
            'Dasar Hukum',
            'Masalah',
            'Isu Strategis',
            'Metode Baru',
            'Keunggulan',
            'Spesifikasi Inovasi',
            'Tujuan',
            'Manfaat',];
    }
}

