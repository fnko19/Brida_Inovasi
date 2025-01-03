<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator5 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi5_id',
        'nama5_inovasi',
        'parameter5',
        'bobot5',
    ];

    public function inovasiILima()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi5_id');
    }

    public function dokumenLima()
    {
        return $this->hasMany(Indikator5File::class, 'indikator5_id');
    }
}
