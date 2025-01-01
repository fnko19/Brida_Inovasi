<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi3_id',
        'nama3_inovasi',
        'parameter3',
        'bobot3',
    ];

    public function inovasiITua()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi3_id');
    }

    public function dokumenTua()
    {
        return $this->hasMany(Indikator3File::class, 'indikator3_id');
    }
}
