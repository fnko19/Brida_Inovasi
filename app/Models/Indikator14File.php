<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator14File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator14_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorEmpatbelasDokumen()
    {
        return $this->belongsTo(Indikator14::class, 'indikator14_id');
    }
}
