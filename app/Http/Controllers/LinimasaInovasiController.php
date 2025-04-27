<?php

namespace App\Http\Controllers;

use App\Models\inovasi_daerah;
use Illuminate\Http\Request;

class LinimasaInovasiController extends Controller
{
    public function index()
    {
        // Ambil semua data inovasi daerah
        $inovasi = inovasi_daerah::all();

        // Kembalikan data dalam format JSON
        return response()->json($inovasi);
    }
}
