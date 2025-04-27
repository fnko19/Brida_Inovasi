<?php

namespace App\Http\Controllers;

use App\Models\DaftarUptd;
use App\Models\DaftarOpd;
use Illuminate\Http\Request;

class DaftarUptdController extends Controller
{
    public function index()
    {

        $daftarUptd = DaftarUptd::with('daftarOpd')->get(); 
  
        $listOpd = DaftarOpd::all(); 
   
        return view('filament.pages.daftar-uptd', compact('daftarUptd', 'listOpd'));
    }


    public function edit($id)
    {

        $daftarUptd = DaftarUptd::findOrFail($id);
 
        $daftarOpds = DaftarOpd::all();

        return view('filament.pages.edit-daftar-uptd', compact('daftarUptd', 'daftarOpds'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_uptd' => 'required|string|max:255',
            'daftar_opd_id' => 'required|exists:daftar_opds,id', 
            'daerah' => 'nullable|string|max:255',
        ]);

        $daftarUptd = DaftarUptd::findOrFail($id);
        
        $daftarUptd->update($validated);

        return redirect()->route('daftar-uptd')->with('success', 'Data UPTD berhasil diperbarui');
    }

    public function destroy($id)
    {
        $daftarUptd = DaftarUptd::findOrFail($id);

        for ($i = 1; $i <= 20; $i++) {
            $method = "indikator{$i}s"; 
            if (method_exists($daftarUptd, $method)) {
                $daftarUptd->$method()->delete();
            }
        }

        $daftarUptd->delete();

        return redirect()->route('daftar-uptd')->with('success', 'Data UPTD berhasil dihapus');
    }

}