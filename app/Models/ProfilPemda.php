<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPemda extends Model
{
    use HasFactory;

    protected $table = 'profil_pemda';

    protected $fillable = ['tingkatan', 'opd_yang_menangani', 'alamat', 'email', 'no_telp', 'admin', 'pakta_integritas'];
}
