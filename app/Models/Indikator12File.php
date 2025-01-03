<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator12File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator12_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorDuabelasDokumen()
    {
        return $this->belongsTo(Indikator12::class, 'indikator12_id');
    }
}
