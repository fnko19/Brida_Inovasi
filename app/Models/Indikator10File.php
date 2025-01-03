<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator10File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator10_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorSepuluhDokumen()
    {
        return $this->belongsTo(Indikator10::class, 'indikator10_id');
    }
}
