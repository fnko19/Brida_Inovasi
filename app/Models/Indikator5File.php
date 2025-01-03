<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator5File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator5_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorLimaDokumen()
    {
        return $this->belongsTo(Indikator5::class, 'indikator5_id');
    }
}
