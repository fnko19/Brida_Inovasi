<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator10 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi10_id',
        'nama10_inovasi',
        'parameter10',
        'bobot10',
    ];

    public function inovasiISepuluh()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi10_id');
    }

    public function dokumenSepuluh()
    {
        return $this->hasMany(Indikator10File::class, 'indikator10_id');
    }
}
