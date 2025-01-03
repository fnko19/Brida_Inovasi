<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator11 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi11_id',
        'nama11_inovasi',
        'parameter11',
        'bobot11',
    ];

    public function inovasiISebelas()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi11_id');
    }

    public function dokumenSebelas()
    {
        return $this->hasMany(Indikator11File::class, 'indikator11_id');
    }
}
