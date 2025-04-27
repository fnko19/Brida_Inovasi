<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarUptd extends Model
{
    use HasFactory;

    protected $fillable = ['nama_uptd', 'daftar_opd_id', 'daerah'];

    public function daftarOpd()  
    {
        return $this->belongsTo(DaftarOpd::class, 'daftar_opd_id');
    }

    public function usersUptd()
    {
        return $this->hasMany(User::class, 'upt_id'); 
    }

    public function inovasis()
    {
        return $this->hasMany(Inovasi_Daerah::class, 'uptd_id');
    }

    public function indikator($nomor)
    {
        $model = "App\\Models\\Indikator{$nomor}";
        return $this->hasMany($model, 'daftar_uptd_id');
    }

    

}
