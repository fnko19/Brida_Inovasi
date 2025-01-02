<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi2_id',
        'nama2_inovasi',
        'parameter2',
        'bobot2',
    ];

    public function inovasiIDua()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi2_id');
    }

    public function dokumenDua()
    {
        return $this->hasMany(Indikator2File::class, 'indikator2_id');
    }

    // protected static function booted()
    // {
    //     static::saved(function ($indikator) {
    //         $inovasi = $indikator->inovasiIDua;
    //         if ($inovasi) {
    //             $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
    //             $bobotDua = $inovasi->indikatorDua()->sum('bobot2');
    //             $inovasi->update(['skor_kematangan' => $bobotSatu + $bobotDua]);
    //         }
    //     });
    // }
}
