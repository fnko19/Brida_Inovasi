<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator9File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator9_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorSembilanDokumen()
    {
        return $this->belongsTo(Indikator9::class, 'indikator9_id');
    }
}
