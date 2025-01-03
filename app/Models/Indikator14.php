<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator14 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi14_id',
        'nama14_inovasi',
        'parameter14',
        'bobot14',
    ];

    public function inovasiIEmpatbelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi14_id');
    }

    public function dokumenEmpatbelas()
    {
        return $this->hasMany(Indikator14File::class, 'indikator14_id');
    }
}
