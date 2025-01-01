<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator2File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator2_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorDuaDokumen()
    {
        return $this->belongsTo(Indikator2::class, 'indikator2_id');
    }
}
