<?php

use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InovasiController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DaftarOpdController;
use App\Http\Controllers\DaftarUptdController;
use App\Http\Controllers\KonfigurasiAkunController;
use App\Http\Controllers\TotalInovasiController;
use App\Http\Controllers\DokumenIndikatorController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfilPemdaController;
use App\Http\Controllers\LaporanDiklatController;
use Illuminate\Http\Request;
use App\Filament\Pages\IndikatorPage;
use App\Models\ProfilPemda;
 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/inovasi', [OverviewController::class, 'index']);

// Route::get('/landing', function () {
//     return view('landing-page'); 
// })->name('landing');

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

Route::get('/inovasi-daerah', [InovasiController::class, 'index'])->name('inovasi-daerah');
Route::get('/inovasi/{id}', [InovasiController::class, 'showInovasi']);

Route::get('/indikator/{inovasi_id}', [IndikatorPage::class, 'getIndikators']);

Route::get('/download/{id}', [DokumenIndikatorController::class, 'download']);

Route::get('/profil-pemda/download-pakta/{id}', [ProfilPemdaController::class, 'downloadPaktaIntegritas']);

Route::get('/data-laporan-diklat', [LaporanDiklatController::class, 'index'])->name('data-laporan-diklat');
Route::get('/data-laporan-diklat/{id}/edit', [LaporanDiklatController::class, 'edit'])->name('data-laporan-diklat.edit'); 
Route::delete('/data-laporan-diklat/{id}', [LaporanDiklatController::class, 'destroy'])->name('data-laporan-diklat.destroy');

Route::get('/excel-inovasi', [InovasiController::class, 'excelInovasi'])->name('excelInovasi');

Route::get('/excel-pemerintah', [InovasiController::class, 'excelPemerintah'])->name('excelPemerintah');

Route::get('/landing', [TotalInovasiController::class, 'index'])->name('landing');

Route::get('/daftar-opd/{id}/edit', [DaftarOpdController::class, 'edit'])->name('daftaropd.edit');
Route::delete('/daftar-opd/{id}', [DaftarOpdController::class, 'destroy'])->name('daftaropd.destroy');
Route::get('/daftar-opd', [DaftarOpdController::class, 'index'])->name('daftar-opd');
Route::put('/daftar-opd/{id}', [DaftarOpdController::class, 'update'])->name('daftar-opd.update'); 

Route::get('/daftar-uptd/{id}/edit', [DaftarUptdController::class, 'edit'])->name('daftaruptd.edit');
Route::delete('/daftar-uptd/{id}', [DaftarUptdController::class, 'destroy'])->name('daftaruptd.destroy');
Route::get('/daftar-uptd', [DaftarUptdController::class, 'index'])->name('daftar-uptd');
Route::put('/daftar-uptd/{id}', [DaftarUptdController::class, 'update'])->name('daftar-uptd.update');

Route::get('/account', [UserController::class, 'index'])->name('account');

Route::delete('/inovasi-daerah/{id}', [InovasiController::class, 'destroy'])->name('inovasi.destroy');

Route::get('/export-excel/{id}', [InovasiController::class, 'exportRaporExcel']);

Route::get('/konfigurasi-akun', [KonfigurasiAkunController::class, 'index'])->name('konfigurasi-akun');
Route::put('/update-role/{id}', [KonfigurasiAkunController::class, 'updateRole'])->name('update-role');
Route::get('/konfigurasi-akun/{id}/edit', [KonfigurasiAkunController::class, 'edit'])->name('konfigurasi-akun.edit');
Route::delete('/konfigurasi-akun/{id}', [KonfigurasiAkunController::class, 'destroy'])->name('konfigurasi-akun.destroy');
Route::get('/konfigurasi-akun/create', [KonfigurasiAkunController::class, 'create'])->name('konfigurasi-akun.create');
Route::post('/konfigurasi-akun', [KonfigurasiAkunController::class, 'store'])->name('konfigurasi-akun.store');
Route::get('/search-akun', [KonfigurasiAkunController::class, 'search'])->name('searchAkun'); 

Route::get('/data-laporan-diklat', [LaporanDiklatController::class, 'index'])->name('data-laporan-diklat');
Route::get('/data-laporan-diklat/{id}/edit', [LaporanDiklatController::class, 'edit'])->name('data-laporan-diklat.edit');
Route::delete('/data-laporan-diklat/{id}', [LaporanDiklatController::class, 'destroy'])->name('data-laporan-diklat.destroy');
Route::put('/data-laporan-diklat/{id}', [LaporanDiklatController::class, 'update'])->name('data-laporan-diklat.update');
Route::post('/data-laporan-diklat', [LaporanDiklatController::class, 'store'])->name('data-laporan-diklat.store'); 

Route::get('/export/pdf', [ExportController::class, 'exportPdf'])->name('export.pdf');
