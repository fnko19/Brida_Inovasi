<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator13File extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikator13_id', 
        'nomor_surat',
        'tgl_surat',
        'tentang',
        'file_path', 
    ];

    public function indikatorTigabelasDokumen()
    {
        return $this->belongsTo(Indikator13::class, 'indikator13_id');
    }
}
