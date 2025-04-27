<?php

namespace App\Http\Controllers;

use App\Models\LaporanDiklat;
use Illuminate\Http\Request;

class LaporanDiklatController extends Controller
{
    public function index()
    {
        $laporanDiklat = LaporanDiklat::all();
        return view('filament.pages.data-laporan-diklat', compact('laporanDiklat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'jenis_pelatihan' => 'required|string|max:255',
            'judul_pelatihan' => 'required|string|max:255',
        ]);

        try {
            LaporanDiklat::create($validated);
            return redirect()->route('data-laporan-diklat')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        try {
            $diklat = LaporanDiklat::findOrFail($id);
            return view('filament.pages.edit-laporan-diklat', compact('diklat'));
        } catch (\Exception $e) {
            return redirect()->route('data-laporan-diklat')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'jenis_pelatihan' => 'required|string|max:255',
            'judul_pelatihan' => 'required|string|max:255',
        ]);

        try {
            $diklat = LaporanDiklat::findOrFail($id);
            $diklat->update($validated);

            return redirect()->route('data-laporan-diklat')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $diklat = LaporanDiklat::findOrFail($id);
            $diklat->delete();

            return redirect()->route('data-laporan-diklat')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}