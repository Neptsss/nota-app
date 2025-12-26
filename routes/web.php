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
    Route::get('/nasabah/{nasabah:id}/detail', 'show')->name('nasabah.show');
    Route::delete('/nasabah/{nasabah:id}/delete', 'destroy')->name('nasabah.delete');
});

Route::controller(transaksiController::class)->middleware('auth')->group(function () {

    Route::get("/transaksi", 'index')->name('transaksi.index');
    Route::get("/transaksi/{transaksi:id}/detail", 'show')->name('transaksi.show');

    // create
    Route::get('/transaksi/create', 'create')->name('transaksi.create');
    Route::post('/transaksi/store', 'store')->name('transaksi.store');

    // Update
    Route::get('/transaksi/{transaksi:id}/edit', 'edit')->name('transaksi.edit');
    Route::put('/transaksi/{transaksi:id}/edit', 'update')->name('transaksi.update');
    // Route::put('/transaksi/{transaksi:slug}', 'update')->name('transaksi.update');

    //Route::delete('/transaksi/{id}/delete','delete')->name('transaksi.delete');
    Route::delete('/transaksi/{transaksi:id}/delete', 'delete')->name('transaksi.delete');
    Route::get('transaksi/export/','export')->name('transaksi.export');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'login')->name('login.auth');
    Route::post('/logout', 'logout')->name('logout');
});
