<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarOpd extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama_opd',
    ];

    public function uptds()
    {
        return $this->hasMany(daftarUptd::class, 'daftar_opd_id');
    }

    public function usersOpds()
    {
        return $this->hasMany(User::class, 'daftar_opd_id'); // Sesuaikan dengan nama kolom foreign key pada tabel users
    }
}
