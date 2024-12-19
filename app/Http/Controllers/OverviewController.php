<?php

namespace App\Http\Controllers;

use App\Models\InovasiDaerah;
use Illuminate\Http\Request;

class InovasiController extends Controller
{
    public function index()
    {
        // Mengambil jumlah inovasi berdasarkan tahapan
        $inovasiDilaporkan = InovasiDaerah::where('tahapan_inovasi', 'Dilaporkan')->count();
        $inovasiDikirim = InovasiDaerah::where('tahapan_inovasi', 'Dikirim')->count();
        $skorJumlahInovasi = InovasiDaerah::sum('anggaran'); // Anggaran sebagai contoh skor
        $inisiatif = InovasiDaerah::where('jenis_inovasi', 'Inisiatif')->count();
        $ujiCoba = InovasiDaerah::where('jenis_inovasi', 'Uji Coba')->count();
        $penerapan = InovasiDaerah::where('jenis_inovasi', 'Penerapan')->count();

        return view('inovasi.index', compact(
            'inovasiDilaporkan',
            'inovasiDikirim',
            'skorJumlahInovasi',
            'inisiatif',
            'ujiCoba',
            'penerapan'
        ));
    }
}


