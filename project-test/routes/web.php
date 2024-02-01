<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PajakController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pajak', function () {
    return view('Pajak');
});

Route::resource('rekening', RekeningController::class);
Route::resource('target', TargetController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('/cetakRekening',[RekeningController::class,'cetak']);
Route::get('/cetakTarget',[TargetController::class,'cetak']);
Route::get('/cetakTransaksi',[TransaksiController::class,'cetak']);


