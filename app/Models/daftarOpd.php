<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class daftarOpd extends Model
{
    use HasFactory;

    protected $table = 'daftar_opds';

    protected $fillable=[
        'nama_opd',
    ];

    public function uptds()
    {
        return $this->hasMany(daftarUptd::class, 'opd_id');
    }

    public function usersOpds()
    {
        return $this->hasMany(User::class, 'opd_id'); 
    }

    public function inovasis()
    {
        return $this->hasMany(Inovasi_Daerah::class, 'opd_id');
    }
}