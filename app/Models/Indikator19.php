<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator19 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi19_id',
        'nama19_inovasi',
        'parameter19',
        'bobot19',
    ];

    public function inovasiISembilanbelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi19_id');
    }

    public function dokumenSembilanbelas()
    {
        return $this->hasMany(Indikator19File::class, 'indikator19_id');
    }
}
