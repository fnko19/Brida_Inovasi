<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    // Mendapatkan data pengumuman untuk frontend
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return response()->json($pengumuman); // Mengirim data ke frontend dalam bentuk JSON
    }

    // Menyimpan atau memperbarui pengumuman
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'tanggal' => 'required|date',
        ]);

        Pengumuman::updateOrCreate(
            ['id' => $request->id], 
            ['judul' => $request->judul, 'tanggal' => $request->tanggal]
        );

        return response()->json(['success' => 'Pengumuman berhasil disimpan']);
    }
}
