<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator4File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator4_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorEmpatDokumen()
    {
        return $this->belongsTo(Indikator4::class, 'indikator4_id');
    }
}
