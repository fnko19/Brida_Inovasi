<?php

namespace App\Http\Controllers;

use App\Models\ProfilPemda;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfilPemdaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilPemdas = ProfilPemda::all();
        return view('profil-pemda.index', compact('profilPemdas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profil-pemda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the fields, including the file upload
        $request->validate([
            'tingkatan' => 'required|string|max:255',
            'opd_yang_menangani' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'admin' => 'required|string|max:255',
            'pakta_integritas' => 'required|file|mimes:pdf|max:10240', // Ensure it's a PDF file with a max size of 10MB
        ]);
    
        // Store the file in the specified directory and get its path
        $path = $request->file('pakta_integritas')->store('pakta_integritas', 'public');
    
        // Create the new ProfilPemda record, including the file path
        ProfilPemda::create([
            'tingkatan' => $request->tingkatan,
            'opd_yang_menangani' => $request->opd_yang_menangani,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'admin' => $request->admin,
            'pakta_integritas' => $path,  // Store the file path in the database
        ]);
    
        return redirect()->route('profil-pemda.index')
            ->with('success', 'Profil Pemda berhasil ditambahkan.');
    }
    
    public function update(Request $request, ProfilPemda $profilPemda)
    {
        // Validate the fields, including the file upload (if present)
        $request->validate([
            'tingkatan' => 'required|string|max:255',
            'opd_yang_menangani' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'admin' => 'required|string|max:255',
            'pakta_integritas' => 'nullable|file|mimes:pdf|max:10240', // File is optional in update
        ]);
    
        // Update the ProfilPemda record
        $profilPemda->update([
            'tingkatan' => $request->tingkatan,
            'opd_yang_menangani' => $request->opd_yang_menangani,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'admin' => $request->admin,
            // If a new file was uploaded, update the file path
            'pakta_integritas' => $request->hasFile('pakta_integritas') 
                ? $request->file('pakta_integritas')->store('pakta_integritas', 'public') 
                : $profilPemda->pakta_integritas, // Keep existing file path if no new file is uploaded
        ]);
    
        return redirect()->route('profil-pemda.index')
            ->with('success', 'Profil Pemda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilPemda $profilPemda)
    {
        $profilPemda->delete();

        return redirect()->route('profil-pemda.index')
            ->with('success', 'Profil Pemda berhasil dihapus.');
    }

    public function downloadPaktaIntegritas($id)
    {
        $profilPemda = ProfilPemda::findOrFail($id);

        if ($profilPemda->pakta_integritas) {
            // Get the file path and return the file for download
            return Storage::disk('public')->download($profilPemda->pakta_integritas);
        }

        return response()->json(['error' => 'File not found.'], 404);
    }
}
