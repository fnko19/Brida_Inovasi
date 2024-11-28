<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarUptd extends Model
{
    use HasFactory;

    protected $fillable = ['nama_uptd', 'daftar_opd_id', 'daerah'];

    public function opds()
    {
        return $this->belongsTo(daftarOpd::class, 'daftar_opd_id');
    }
}
