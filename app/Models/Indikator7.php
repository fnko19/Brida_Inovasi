<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator7 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi7_id',
        'nama7_inovasi',
        'parameter7',
        'bobot7',
    ];

    public function inovasiITujuh()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi7_id');
    }

    public function dokumenTujuh()
    {
        return $this->hasMany(Indikator7File::class, 'indikator7_id');
    }
}
