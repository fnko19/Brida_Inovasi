<?php

use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InovasiController;
use App\Http\Controllers\OverviewController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/inovasi', [OverviewController::class, 'index']);

Route::get('/landing', function () {
    return view('landing-page'); 
})->name('landing');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database-inovasi', function () {
    return view('filament.pages.database');
})->name('database.inovasi');

Route::get('/faq', function () {
    return view('filament.pages.FAQ');
})->name('faq');

Route::get('/lomba-inovasi', function () {
    return view('filament.pages.lomba-inovasi');
})->name('lomba.inovasi');

Route::get('/laporan-diklat', function () {
    return view('filament.pages.laporan-diklat');
})->name('laporan.diklat');

Route::get('/konfigurasi', function () {
    return view('filament.pages.konfigurasi');
})->name('konfigurasi');

Route::get('/arsip', function () {
    return view('filament.pages.arsip');
})->name('arsip');

Route::get('/FAQ', function (){
    return view('filament.pages.faq-whats-app');
})->name('FAQ');

Route::get('/profil-pemda', function () {
    return view('filament.pages.profil-pemda');
})->name('profil-pemda');

Route::get('/inovasi-daerah', function () {
    return view('filament.pages.inovasi-daerah');
})->name('inovasi-daerah');

Route::get('/inovasi-pemerintah-daerah', function () {
    return view('filament.pages.inovasi-pemerintah-daerah');
})->name('inovasi-pemerintah-daerah');

Route::get('/data-laporan-diklat', function () {
    return view('filament.pages.data-laporan-diklat');
})->name('data-laporan-diklat');

Route::get('/konfigurasi-akun', function () {
    return view('filament.pages.konfigurasi-akun');
})->name('konfigurasi-akun');

Route::get('/account', function () {
    return view('filament.pages.account');
})->name('account');

Route::get('/daftar-opd', function () {
    return view('filament.pages.daftar-opd');
})->name('daftar-opd');

Route::get('/daftar-uptd', function () {
    return view('filament.pages.daftar-uptd');
})->name('daftar-uptd');

Route::get('/akses-api', function () {
    return view('filament.pages.akses-api');
})->name('akses-api');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/landing', function () {
        return view('landing-page');
    })->name('landing');
});

Route::get('/navbar', function () {
    return view('components.navbar');
})->name('navbar');



