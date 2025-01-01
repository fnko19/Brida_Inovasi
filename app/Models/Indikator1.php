<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi_id',
        'nama_inovasi',
        'parameter',
        'bobot',
    ];

    public function inovasiISatu()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi_id');
    }

    public function dokumenSatu()
    {
        return $this->hasMany(Indikator1File::class, 'indikator_id');
    }

    // protected static function booted()
    // {
    //     static::saved(function ($indikator) {
    //         $inovasi = $indikator->inovasiISatu;
    //         if ($inovasi) {
    //             $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
    //             $bobotDua = $inovasi->indikatorDua()->sum('bobot2');
    //             $inovasi->update(['skor_kematangan' => $bobotSatu + $bobotDua]);
    //         }
    //     });
    // }

}
