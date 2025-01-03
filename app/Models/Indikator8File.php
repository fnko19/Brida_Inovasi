<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator8File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator8_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorDelapanDokumen()
    {
        return $this->belongsTo(Indikator8::class, 'indikator8_id');
    }
}
