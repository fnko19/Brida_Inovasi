<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator17File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator17_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorTujuhbelasDokumen()
    {
        return $this->belongsTo(Indikator17::class, 'indikator17_id');
    }
}
