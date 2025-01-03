<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator6 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi6_id',
        'nama6_inovasi',
        'parameter6',
        'bobot6',
    ];

    public function inovasiIEnam()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi6_id');
    }

    public function dokumenEnam()
    {
        return $this->hasMany(Indikator6File::class, 'indikator6_id');
    }
}
