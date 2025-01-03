<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator19File extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator19_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorSembilanbelasDokumen()
    {
        return $this->belongsTo(Indikator19::class, 'indikator19_id');
    }
}
