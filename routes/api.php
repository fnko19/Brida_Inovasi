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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

//     return response()->json([
//         'username' => $request->user()->name,   
//     ]);
// });

//     return $request->user();
// });

Route::get('/download-pdf/{id}', [InovasiController::class, 'downloadPdf'])->name('inovasi.download.pdf');
Route::get('/export-excel/{id}', [InovasiController::class, 'exportExcel'])->name('export.excel');


