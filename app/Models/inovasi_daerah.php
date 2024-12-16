<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inovasi_daerah extends Model
{
    use HasFactory;

    protected $fillable=[
        'dibuat_oleh',
        'nama_inovasi',
        'tahapan_inovasi',
        'inisiator',
        'nama_inisiator',
        'jenis_inovasi',
        'bentuk_inovasi',
        'tematik',
        'prioritas',
        'misi',
        'urusan_utama',
        'urusan_iris',
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
        'manfaat',
        'anggaran',
        'profil_bisnis',
        'doc_HAKI',
        'penghargaan',
    ];
}
