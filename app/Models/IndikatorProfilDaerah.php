<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorProfilDaerah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_indikator',
        'informasi',
    ];

    public function dokumen()
    {
        return $this->hasMany(DokumenIndikator::class, 'indikator_id');
    }
}
