<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator11File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator11_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorSebelasDokumen()
    {
        return $this->belongsTo(Indikator11::class, 'indikator11_id');
    }
}
