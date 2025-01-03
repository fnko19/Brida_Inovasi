<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator6File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator6_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorEnamDokumen()
    {
        return $this->belongsTo(Indikator6::class, 'indikator6_id');
    }
}
