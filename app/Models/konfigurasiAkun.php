<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Relasi dengan Opdss
    public function opdss()
    {
        return $this->belongsTo(Opdss::class, 'opd_id'); // Asumsikan kolom 'opd_id' di tabel users
    }

    // Definisikan kolom yang bisa diisi (fillable)
    protected $fillable = ['name', 'email', 'role', 'opd_id', 'kecamatan'];
}