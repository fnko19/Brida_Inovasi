<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator16 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi16_id',
        'nama16_inovasi',
        'parameter16',
        'bobot16',
    ];

    public function inovasiIEnambelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi16_id');
    }

    public function dokumenEnambelas()
    {
        return $this->hasMany(Indikator16File::class, 'indikator16_id');
    }
}
