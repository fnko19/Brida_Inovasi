<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenIndikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikator()
    {
        return $this->belongsTo(IndikatorProfilDaerah::class, 'indikator_id');
    }
}
