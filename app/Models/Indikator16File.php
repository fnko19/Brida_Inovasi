<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator16File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator16_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorEnambelasDokumen()
    {
        return $this->belongsTo(Indikator16::class, 'indikator16_id');
    }
}
