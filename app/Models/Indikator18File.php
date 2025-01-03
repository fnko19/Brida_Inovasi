<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator18File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator18_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorDelapanbelasDokumen()
    {
        return $this->belongsTo(Indikator18::class, 'indikator18_id');
    }
}
