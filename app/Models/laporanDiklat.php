<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanDiklat extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama', 
        'nip', 
        'instansi',
        'jenis_pelatihan', 
        'judul_pelatihan',
    ];
}
