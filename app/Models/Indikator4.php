<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi4_id',
        'nama4_inovasi',
        'parameter4',
        'bobot4',
    ];

    public function inovasiIEmpat()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi4_id');
    }

    public function dokumenEmpat()
    {
        return $this->hasMany(Indikator4File::class, 'indikator4_id');
    }
}
