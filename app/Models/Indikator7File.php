<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator7File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator7_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorTujuhDokumen()
    {
        return $this->belongsTo(Indikator7::class, 'indikator7_id');
    }
}
