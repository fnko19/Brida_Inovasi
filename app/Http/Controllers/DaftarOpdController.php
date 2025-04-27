<?php
namespace App\Http\Controllers;

use App\Models\DaftarOpd;
use Illuminate\Http\Request;

class DaftarOpdController extends Controller
{
    // Show all OPD records
    public function index()
    {
        // Get all data from the daftar_opd table
        $daftarOpd = DaftarOpd::all();
        return view('filament.pages.daftar-opd', compact('daftarOpd'));
    }

    // Show edit form for a specific OPD record
    public function edit($id)
    {
        // Find OPD record by ID
        $opd = DaftarOpd::findOrFail($id);
        
        // Return the edit view with the OPD data
        return view('filament.pages.edit-opd', compact('opd'));
    }

    // Update OPD record
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'nama_opd' => 'required|string|max:255',
        ]);

        // Find the OPD by ID
        $opd = DaftarOpd::findOrFail($id);
        
        // Update the OPD data
        $opd->update($validated);

        // Redirect back with a success message
        return redirect()->route('daftar-opd')->with('success', 'Data OPD berhasil diperbarui.');
    }

    // Delete OPD record
    public function destroy($id)
    {
        // Find OPD record by ID
        $opd = DaftarOpd::findOrFail($id);

        // Delete the OPD record
        $opd->delete();

        // Redirect back with a success message
        return redirect()->route('daftar-opd')->with('success', 'Data OPD berhasil dihapus.');
    }
}