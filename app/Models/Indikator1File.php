<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator1File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorSatuDokumen()
    {
        return $this->belongsTo(Indikator1::class, 'indikator_id');
    }
}
