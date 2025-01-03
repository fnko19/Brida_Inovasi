<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator17 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi17_id',
        'nama17_inovasi',
        'parameter17',
        'bobot17',
    ];

    public function inovasiITujuhbelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi17_id');
    }

    public function dokumenTujuhbelas()
    {
        return $this->hasMany(Indikator17File::class, 'indikator17_id');
    }
}
