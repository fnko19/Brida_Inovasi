<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InovasiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    if (!$user) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    return response()->json([
        'username' => $user->name,
    ]);
});

// Akun Routes
Route::get('/akun', function () {
    return Akun::all();
});

Route::post('/akun', function (Request $request) {
    return Akun::create($request->all());
});

Route::get('/akun/{id}', function ($id) {
    return Akun::findOrFail($id);
});

Route::put('/akun/{id}', function (Request $request, $id) {
    $akun = Akun::findOrFail($id);
    $akun->update($request->all());
    return $akun;
});

Route::delete('/akun/{id}', function ($id) {
    Akun::destroy($id);
    return response()->json(null, 204);
});

// daftarOpd Routes
Route::get('/daftar-opd', function () {
    return daftarOpd::all();
});

Route::post('/daftar-opd', function (Request $request) {
    return daftarOpd::create($request->all());
});

Route::get('/daftar-opd/{id}', function ($id) {
    return daftarOpd::findOrFail($id);
});

Route::put('/daftar-opd/{id}', function (Request $request, $id) {
    $daftarOpd = daftarOpd::findOrFail($id);
    $daftarOpd->update($request->all());
    return $daftarOpd;
});

Route::delete('/daftar-opd/{id}', function ($id) {
    daftarOpd::destroy($id);
    return response()->json(null, 204);
});

// daftarUptd Routes
Route::get('/daftar-uptd', function () {
    return daftarUptd::all();
});

Route::post('/daftar-uptd', function (Request $request) {
    return daftarUptd::create($request->all());
});

Route::get('/daftar-uptd/{id}', function ($id) {
    return daftarUptd::findOrFail($id);
});

Route::put('/daftar-uptd/{id}', function (Request $request, $id) {
    $daftarUptd = daftarUptd::findOrFail($id);
    $daftarUptd->update($request->all());
    return $daftarUptd;
});

Route::delete('/daftar-uptd/{id}', function ($id) {
    daftarUptd::destroy($id);
    return response()->json(null, 204);
});

// LaporanDiklat Routes
Route::get('/laporan-diklat', function () {
    return LaporanDiklat::all();
});

Route::post('/laporan-diklat', function (Request $request) {
    return LaporanDiklat::create($request->all());
});

Route::get('/laporan-diklat/{id}', function ($id) {
    return LaporanDiklat::findOrFail($id);
});

Route::put('/laporan-diklat/{id}', function (Request $request, $id) {
    $laporanDiklat = LaporanDiklat::findOrFail($id);
    $laporanDiklat->update($request->all());
    return $laporanDiklat;
});

Route::delete('/laporan-diklat/{id}', function ($id) {
    LaporanDiklat::destroy($id);
    return response()->json(null, 204);
});

// InovasiDaerah Routes
Route::get('/inovasi-daerah', function () {
    return inovasi_daerah::all();
});

Route::post('/inovasi-daerah', function (Request $request) {
    return inovasi_daerah::create($request->all());
});

Route::get('/inovasi-daerah/{id}', function ($id) {
    return inovasi_daerah::findOrFail($id);
});

Route::put('/inovasi-daerah/{id}', function (Request $request, $id) {
    $inovasiDaerah = inovasi_daerah::findOrFail($id);
    $inovasiDaerah->update($request->all());
    return $inovasiDaerah;
});

Route::delete('/inovasi-daerah/{id}', function ($id) {
    inovasi_daerah::destroy($id);
    return response()->json(null, 204);
});

Route::get('/download-pdf/{id}', [InovasiController::class, 'downloadPdf'])->name('inovasi.download.pdf');
Route::get('/export-excel/{id}', [InovasiController::class, 'exportExcel'])->name('export.excel');


