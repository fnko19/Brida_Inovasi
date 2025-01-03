<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator15File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator15_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorLimabelasDokumen()
    {
        return $this->belongsTo(Indikator15::class, 'indikator15_id');
    }
}
