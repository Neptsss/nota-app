<?php

use App\Http\Controllers\nasabahController;
use App\Http\Controllers\notaController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvidelsr and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(nasabahController::class)->middleware('auth')->group(function () {
    Route::get('/nasabah', 'index')->name('nasabah.index');
    Route::get('/nasabah/detail', 'show')->name('nasabah.show');
});

Route::controller(transaksiController::class)->middleware('auth')->group(function () {

    Route::get("/transaksi", 'index')->name('transaksi.index');
    Route::get("/transaksi/detail", 'show')->name('transaksi.show');

    // create
    Route::get('/transaksi/create', 'create')->name('transaksi.create');
    Route::post('/transaksi/store', 'store')->name('transaksi.store');

    // Update
    Route::get('/transaksi/{transaksi:id}/edit', 'edit')->name('transaksi.edit');
    Route::put('/transaksi/{transaksi:id}', 'update')->name('transaksi.update');

    // Delete
    Route::delete('/transaksi/{transaksi:id}/delete', 'destroy')->name('transaksi.delete');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'login')->name('login.auth');
    Route::post('/logout', 'logout')->name('logout');
});
