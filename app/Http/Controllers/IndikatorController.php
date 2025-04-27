<?php

namespace App\Http\Controllers;

use App\Models\inovasi_daerah;
use App\Models\IndikatorProfilDaerah;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    // Menampilkan daftar semua indikator
    public function index()
    {
        // Ambil semua data indikator dari database
        $indikators = IndikatorProfilDaerah::all();
        
        // Kembalikan response (dalam bentuk JSON atau view)
        return response()->json($indikators); // Jika ingin mengembalikan data dalam format JSON
        // atau jika ingin mengembalikan tampilan view
        // return view('indikator.index', compact('indikators'));
    }

    // Menampilkan form untuk membuat indikator baru
    public function create()
    {
        // Tampilkan form pembuatan indikator
        return view('indikator.create');
    }

    // Menyimpan indikator baru ke dalam database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Validasi lainnya sesuai dengan kolom di tabel indikator
        ]);

        $indikator = Indikator::create($validated);

        return redirect()->route('indikator.index');
    }

    // Menampilkan detail indikator
    public function show(Indikator $indikator)
    {
        return view('indikator.show', compact('indikator'));
    }

    // Menampilkan form untuk mengedit indikator
    public function edit(Indikator $indikator)
    {
        return view('indikator.edit', compact('indikator'));
    }

    // Memperbarui data indikator
    public function update(Request $request, Indikator $indikator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Validasi lainnya sesuai dengan kolom di tabel indikator
        ]);

        $indikator->update($validated);

        return redirect()->route('indikator.index');
    }

    // Menghapus indikator
    public function destroy(Indikator $indikator)
    {
        $indikator->delete();

        return redirect()->route('indikator.index');
    }

    public function getIndikator()
    {
        $indikators = Indikator::with('dokumen')->get();

        return response()->json($indikators);
    }

}
