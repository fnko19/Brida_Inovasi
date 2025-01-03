<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator9 extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inovasi9_id',
        'nama9_inovasi',
        'parameter9',
        'bobot9',
    ];

    public function inovasiISembilan()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi9_id');
    }

    public function dokumenSembilan()
    {
        return $this->hasMany(Indikator9File::class, 'indikator9_id');
    }
}
