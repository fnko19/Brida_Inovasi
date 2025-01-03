<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator20 extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovasi20_id',
        'nama20_inovasi',
        'parameter20',
        'bobot20',
    ];

    public function inovasiIDuapuluh()
    {
        return $this->belongsTo(inovasi_daerah::class, 'inovasi20_id');
    }

    public function dokumenDuapuluh()
    {
        return $this->hasMany(Indikator20File::class, 'indikator20_id');
    }
}
