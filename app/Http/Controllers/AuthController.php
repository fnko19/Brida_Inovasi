<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view ini ada di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);  // Not found alert
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/navbar');
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Password salah'], 401);  // Unauthorized alert
        }

        // Generate token jika login berhasil
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Returning success message as JSON to trigger the alert
        return response()->json(['message' => 'Login berhasil!'], 200);  // Success alert
    }

    // Function to handle user logout
    public function logout(Request $request)
    {
        // Delete all tokens for the authenticated user
        $request->user()->tokens()->delete();

        // Return success message as JSON
        return redirect()->route('login.form'); 
    }
}