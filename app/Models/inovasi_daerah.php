<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inovasi_daerah extends Model
{
    use HasFactory;

    protected $fillable=[
        'dibuat_oleh',
        'nama_inovasi',
        'tahapan_inovasi',
        'inisiator',
        'nama_inisiator',
        'jenis_inovasi',
        'bentuk_inovasi',
        'tematik',
        'prioritas',
        'misi',
        'urusan_utama',
        'urusan_irisan',
        'waktu_uji',
        'waktu_penerapan',
        'berkembang',
        'dasar_hukum',
        'masalah',
        // 'isu_strategis',
        'metode_baru',
        'keunggulan',
        'spesifikasi_inovasi',
        // 'tujuan',
        'manfaat',
        'anggaran',
        'profil_bisnis',
        'doc_HAKI',
        'penghargaan',
        'skor_kematangan',
        'hasil_inovasi_sebelum',
        'hasil_inovasi_setelah',
        'isu_global',
        'isu_nasional',
        'isu_lokal',
        'tujuan_pendek',
        'tujuan_menengah',
        'tujuan_panjang',
    ];

    protected $casts = [
        'urusan_irisan' => 'array',
    ];

    public function indikatorSatu()
    {
        return $this->hasMany(Indikator1::class, 'inovasi_id');
    }

    public function indikatorDua()
    {
        return $this->hasMany(Indikator2::class, 'inovasi2_id');
    }

    public function indikatorTiga()
    {
        return $this->hasMany(Indikator3::class, 'inovasi3_id');
    }

    protected $appends = ['skor_kematangan'];

    public function getSkorKematanganAttribute()
    {
        $bobotSatu = $this->indikatorSatu()->where('inovasi_id', $this->id)->sum('bobot');
        $bobotDua = $this->indikatorDua()->where('inovasi2_id', $this->id)->sum('bobot2');
        $bobotTiga = $this->indikatorTiga()->where('inovasi3_id', $this->id)->sum('bobot3');
        return $bobotSatu + $bobotDua +$bobotTiga;
    }
    // protected static function boot()
    // {
    //     parent::boot();
    
    //     static::saving(function ($model) {
    //         $bobotSatu = $model->indikatorSatu()->where('inovasi_id', $model->id)->sum('bobot');
    //         $bobotDua = $model->indikatorDua()->where('inovasi2_id', $model->id)->sum('bobot2');
    //         $model->skor_kematangan = $bobotSatu + $bobotDua;
    //     });
    // }
    

//     public static function booted()
// {
//     static::saving(function ($inovasi) {
//         $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
//         $bobotDua = $inovasi->indikatorDua()->sum('bobot2');
    
//         // Hitung skor kematangan
//         $inovasi->skor_kematangan = $bobotDua + $bobotSatu;
//     });
// }


    // public static function booted()
    // {
    //     static::saving(function ($inovasi) {
    //         $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
    //         $bobotDua = $inovasi->indikatorDua()->sum('bobot2');
    
    //         $inovasi->skor_kematangan = $bobotSatu + $bobotDua;
    //         $inovasi->update([
    //             'skor_kematangan' => $inovasi->skor_kematangan
    //         ]);
    //     });
    // }
    


//     protected static function booted()
// {
//     static::saved(function ($inovasi) {
//         // Hitung total bobot dari indikatorSatu dan indikatorDua
//         $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
//         $bobotDua = $inovasi->indikatorDua()->sum('bobot2');

//         // Hitung skor kematangan
//         $inovasi->skor_kematangan = $bobotSatu + $bobotDua;

//         // Pastikan nilai skor_kematangan disimpan ke dalam database
//         $inovasi->save();  // Menyimpan perubahan ke database
//     });
// }


//     public static function booted()
// {
//     static::saving(function ($inovasi) {
//         // Hitung total bobot dari indikatorSatu dan indikatorDua
//         $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
//         $bobotDua = $inovasi->indikatorDua()->sum('bobot2');

//         // Hitung skor kematangan
//         $inovasi->skor_kematangan = $bobotSatu + $bobotDua;

//         // Pastikan nilai skor_kematangan disimpan ke dalam database
//         $inovasi->save();  // Menyimpan perubahan ke database
//     });
// }


//     public static function booted()
// {
//     static::saving(function ($inovasi) {
//         // Hitung total bobot dari indikatorSatu dan indikatorDua
//         $bobotSatu = $inovasi->indikatorSatu()->sum('bobot');
//         $bobotDua = $inovasi->indikatorDua()->sum('bobot2');

//         // Hitung skor kematangan
//         $inovasi->skor_kematangan = $bobotSatu + $bobotDua;
//     });
// }
    // protected static function booted()
    // {
    //     static::saved(function ($inovasi) {
    //         // Ambil jumlah bobot dari indikatorSatu berdasarkan inovasi_id
    //         $bobotSatu = $inovasi->indikatorSatu()->where('inovasi_id', $inovasi->id)->sum('bobot'); 
    //         // Ambil jumlah bobot dari indikatorDua berdasarkan inovasi_id
    //         $bobotDua = $inovasi->indikatorDua()->where('inovasi_id', $inovasi->id)->sum('bobot2'); 
    
    //         // Hitung skor kematangan
    //         $skorKematangan = $bobotSatu + $bobotDua;
    
    //         // Update skor kematangan di model inovasi
    //         $inovasi->update(['skor_kematangan' => $skorKematangan]);
    //     });
    // }

//     public function getSkorKematanganAttribute()
// {
//     $bobotSatu = $this->indikatorSatu()->where('inovasi_id', $this->id)->sum('bobot');
//     $bobotDua = $this->indikatorDua()->where('inovasi2_id', $this->id)->sum('bobot2');
//     return $bobotSatu + $bobotDua;
// }

}
