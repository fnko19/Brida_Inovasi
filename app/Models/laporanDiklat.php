<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanDiklat extends Model
{
    use HasFactory;

    protected $table = 'laporan_diklats'; 

    protected $fillable = [
        'nama', 
        'nip', 
        'instansi',
        'jenis_pelatihan', 
        'judul_pelatihan',
    ];
}