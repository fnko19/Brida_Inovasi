<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator8 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi8_id',
        'nama8_inovasi',
        'parameter8',
        'bobot8',
    ];

    public function inovasiIDelapan()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi8_id');
    }

    public function dokumenDelapan()
    {
        return $this->hasMany(Indikator8File::class, 'indikator8_id');
    }
}
