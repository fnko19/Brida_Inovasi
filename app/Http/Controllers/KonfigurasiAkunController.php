<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;

class KonfigurasiAkunController extends Controller
{
    // Menampilkan halaman konfigurasi akun
    public function index()
    {
        $users = User::all();
        return view('filament.pages.konfigurasi-akun', compact('users'));
    }

    // Menampilkan form tambah akun
    public function create()
    {
        return view('filament.pages.tambah-akun');
    }
    public function search(Request $request)
    {
        $email = $request->query('email');

        if (empty($email)) {
            return response()->json(['error' => 'Email tidak boleh kosong.'], 400);
        }

        $users = User::where('email', 'LIKE', "%$email%")->with('opdss')->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'Akun tidak ditemukan.'], 404);
        }

        return response()->json($users);
    }

    // Menyimpan akun baru
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'role' => 'required|string',
            'daerah' => 'required|string',
            'opd' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Menyimpan akun baru ke database
        $user = new User();
        $user->role = $validated['role'];
        $user->daerah = $validated['daerah'];
        $user->opd = $validated['opd'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        // Mengarahkan kembali ke halaman konfigurasi akun
        return redirect()->route('konfigurasi-akun.index')->with('success', 'Akun baru berhasil ditambahkan!');
    }
}