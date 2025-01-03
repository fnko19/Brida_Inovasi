<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator13 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi13_id',
        'nama13_inovasi',
        'parameter13',
        'bobot13',
    ];

    public function inovasiITigabelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi13_id');
    }

    public function dokumenTigabelas()
    {
        return $this->hasMany(Indikator13File::class, 'indikator13_id');
    }
}
