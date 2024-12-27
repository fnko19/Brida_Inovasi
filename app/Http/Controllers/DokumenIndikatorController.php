<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndikatorProfilDaerah;

class DokumenIndikatorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'indikator_id' => 'required|exists:indikator_profil_daerahs,id',
            'nomor_surat' => 'required',
            'tgl_surat' => 'required|date',
            'tentang' => 'required',
            'file_path' => 'required|file',
        ]);

        // Simpan data dokumen indikator
        $dokumenIndikator = new DokumenIndikator();
        $dokumenIndikator->indikator_id = $request->indikator_id;
        $dokumenIndikator->nomor_surat = $request->nomor_surat;
        $dokumenIndikator->tgl_surat = $request->tgl_surat;
        $dokumenIndikator->tentang = $request->tentang;
        $dokumenIndikator->file_path = $request->file('file_path')->store('uploads');
        $dokumenIndikator->save();

        // Simpan indikator_id yang dipilih ke session
        session(['last_selected_indikator_id' => $request->indikator_id]);

        // Redirect atau response lainnya
        return redirect()->route('dokumen-indikator.index')->with('success', 'Dokumen berhasil disimpan.');
    }

}
