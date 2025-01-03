<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator15 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi15_id',
        'nama15_inovasi',
        'parameter15',
        'bobot15',
    ];

    public function inovasiILimabelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi15_id');
    }

    public function dokumenLimabelas()
    {
        return $this->hasMany(Indikator15File::class, 'indikator15_id');
    }
}
