<?php

use App\Http\Controllers\nasabahController;
use App\Http\Controllers\notaController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('nota');
// });

// Route::get('/', [notaController::class, 'view']);
Route::get('/',function(){
    return view('welcome');
});
Route::get('/nasabah',[nasabahController::class, 'index']);
// Route::controller('/transaksi', transaksiController::Cl);
Route::get("/transaksi", [transaksiController::class, 'index']);
