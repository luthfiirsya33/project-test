<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TargetController;
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

Route::resource('rekening', RekeningController::class);
Route::resource('target', TargetController::class);
Route::get('/cetakrekening',[RekeningController::class,'cetak']);

// //CRUD Data Rekening
// Route::get('/rekening/create',[RekeningController::class,'create']);
// //Create Store
// Route::post('/rekening',[RekeningController::class,'store']);
// //Read
// Route::get('/rekening',[RekeningController::class,'index']);
// //Update
// Route::get('/rekening/{id_rekening}/edit', [RekeningController::class,'edit']);
// //Update Store
// Route::put('/rekening/{id_rekening}', [RekeningController::class,'update']);
// //Delete
// Route::delete('/rekening/{id_rekening}', [RekeningController::class,'destroy']);


// //CRUD Data Target
// Route::get('/target/create',[TargetController::class,'create']);
// //Create Store
// Route::post('/target',[TargetController::class,'store']);
// //Read
// Route::get('/target',[TargetController::class,'index']);
// //Update
// Route::get('/target/{id_target}/edit', [TargetController::class,'edit']);
// //Update Store
// Route::put('/target/{id_target}', [TargetController::class,'update']);
// //Delete
// Route::delete('/target/{id_target}', [TargetController::class,'destroy']);

