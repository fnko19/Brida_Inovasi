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
        'urusan_utama',
        'urusan_iris',
        'waktu_uji',
        'waktu_penerapan',
        'berkembang',
        'rancang_bangun',
        'tujuan',
        'manfaat',
        'anggaran',
        'profil_bisnis',
        'doc_HAKI',
        'penghargaan',
    ];
}
