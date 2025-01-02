<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator3File extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikator3_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorTigaDokumen()
    {
        return $this->belongsTo(Indikator3::class, 'indikator3_id');
    }
}
