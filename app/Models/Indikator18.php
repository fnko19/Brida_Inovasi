<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator18 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi18_id',
        'pilihParam18',
        'nama18_inovasi',
        'parameter18',
        'bobot18',
    ];

    public function inovasiIDelapanbelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi18_id');
    }

    public function dokumenDelapanbelas()
    {
        return $this->hasMany(Indikator18File::class, 'indikator18_id');
    }
}
