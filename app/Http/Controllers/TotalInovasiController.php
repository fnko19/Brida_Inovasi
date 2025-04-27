<?php

namespace App\Http\Controllers;

use App\Models\daftarOpd;
use App\Models\daftarUptd;
use App\Models\inovasi_daerah;

class TotalInovasiController extends Controller
{
    public function index()
    {
        $allOpds = daftarOpd::all()->map(function ($opd) {
            return [
                'nama_opd' => $opd->nama_opd,
                'jumlah_inovasi' => inovasi_daerah::where('opd_id', $opd->id)->count(),
            ];
        })->toArray();

        $allUptds = daftarUptd::all()->map(function ($uptd) {
            return [
                'nama_uptd' => $uptd->nama_uptd,
                'jumlah_inovasi' => inovasi_daerah::where('uptd_id', $uptd->id)->count(),
            ];
        })->toArray();

        return view('landing-page', compact('allOpds', 'allUptds'));
    }
}
