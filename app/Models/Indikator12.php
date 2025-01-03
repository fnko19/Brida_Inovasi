<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator12 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi12_id',
        'nama12_inovasi',
        'parameter12',
        'bobot12',
    ];

    public function inovasiIDuabelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi12_id');
    }

    public function dokumenDuabelas()
    {
        return $this->hasMany(Indikator12File::class, 'indikator12_id');
    }
}
