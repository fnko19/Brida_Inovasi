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
        'laporan_diklat_id',
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

    public function indikatorEmpat()
    {
        return $this->hasMany(Indikator4::class, 'inovasi4_id');
    }

    public function indikatorLima()
    {
        return $this->hasMany(Indikator5::class, 'inovasi5_id');
    }

    public function indikatorEnam()
    {
        return $this->hasMany(Indikator6::class, 'inovasi6_id');
    }

    public function indikatorTujuh()
    {
        return $this->hasMany(Indikator7::class, 'inovasi7_id');
    }

    public function indikatorDelapan()
    {
        return $this->hasMany(Indikator8::class, 'inovasi8_id');
    }

    public function indikatorSembilan()
    {
        return $this->hasMany(Indikator9::class, 'inovasi9_id');
    }

    public function indikatorSepuluh()
    {
        return $this->hasMany(Indikator10::class, 'inovasi10_id');
    }

    public function indikatorSebelas()
    {
        return $this->hasMany(Indikator11::class, 'inovasi11_id');
    }

    public function indikatorDuabelas()
    {
        return $this->hasMany(Indikator12::class, 'inovasi12_id');
    }

    public function indikatorTigabelas()
    {
        return $this->hasMany(Indikator13::class, 'inovasi13_id');
    }

    public function indikatorEmpatbelas()
    {
        return $this->hasMany(Indikator14::class, 'inovasi14_id');
    }

    public function indikatorLimabelas()
    {
        return $this->hasMany(Indikator15::class, 'inovasi15_id');
    }

    public function indikatorEnambelas()
    {
        return $this->hasMany(Indikator16::class, 'inovasi16_id');
    }

    public function indikatorTujuhbelas()
    {
        return $this->hasMany(Indikator17::class, 'inovasi17_id');
    }

    public function indikatorDelapanbelas()
    {
        return $this->hasMany(Indikator18::class, 'inovasi18_id');
    }

    public function indikatorSembilanbelas()
    {
        return $this->hasMany(Indikator19::class, 'inovasi19_id');
    }

    public function indikatorDuapuluh()
    {
        return $this->hasMany(Indikator20::class, 'inovasi20_id');
    }


    protected $appends = ['skor_kematangan'];

    public function getSkorKematanganAttribute()
    {
        $bobotSatu = $this->indikatorSatu()->where('inovasi_id', $this->id)->sum('bobot');
        $bobotDua = $this->indikatorDua()->where('inovasi2_id', $this->id)->sum('bobot2');
        $bobotTiga = $this->indikatorTiga()->where('inovasi3_id', $this->id)->sum('bobot3');
        $bobotEmpat = $this->indikatorEmpat()->where('inovasi4_id', $this->id)->sum('bobot4');
        $bobotLima = $this->indikatorLima()->where('inovasi5_id', $this->id)->sum('bobot5');
        $bobotEnam = $this->indikatorEnam()->where('inovasi6_id', $this->id)->sum('bobot6');
        $bobotTujuh = $this->indikatorTujuh()->where('inovasi7_id', $this->id)->sum('bobot7');
        $bobotDelapan = $this->indikatorDelapan()->where('inovasi8_id', $this->id)->sum('bobot8');
        $bobotSembilan = $this->indikatorSembilan()->where('inovasi9_id', $this->id)->sum('bobot9');
        $bobotSepuluh = $this->indikatorSepuluh()->where('inovasi10_id', $this->id)->sum('bobot10');
        $bobotSebelas = $this->indikatorSebelas()->where('inovasi11_id', $this->id)->sum('bobot11');
        $bobotDuabelas = $this->indikatorDuabelas()->where('inovasi12_id', $this->id)->sum('bobot12');
        $bobotTigabelas = $this->indikatorTigabelas()->where('inovasi13_id', $this->id)->sum('bobot13');
        $bobotEmpatbelas = $this->indikatorEmpatbelas()->where('inovasi14_id', $this->id)->sum('bobot14');
        $bobotLimabelas = $this->indikatorLimabelas()->where('inovasi15_id', $this->id)->sum('bobot15');
        $bobotEnambelas = $this->indikatorEnambelas()->where('inovasi16_id', $this->id)->sum('bobot16');
        $bobotTujuhbelas = $this->indikatorTujuhbelas()->where('inovasi17_id', $this->id)->sum('bobot17');
        $bobotDelapanbelas = $this->indikatorDelapanbelas()->where('inovasi18_id', $this->id)->sum('bobot18');
        $bobotSembilanbelas = $this->indikatorSembilanbelas()->where('inovasi19_id', $this->id)->sum('bobot19');
        $bobotDuapuluh = $this->indikatorDuapuluh()->where('inovasi20_id', $this->id)->sum('bobot20');
        return $bobotSatu + $bobotDua +$bobotTiga +$bobotEmpat +$bobotLima +$bobotEnam +$bobotTujuh +$bobotDelapan +$bobotSembilan +$bobotSepuluh +$bobotSebelas +$bobotDuabelas +$bobotTigabelas +$bobotEmpatbelas +$bobotLimabelas +$bobotEnambelas +$bobotTujuhbelas +$bobotDelapanbelas +$bobotSembilanbelas +$bobotDuapuluh;
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
