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

Route::controller(nasabahController::class)->group(function () {
    Route::get('/nasabah', 'index')->name('nasabah.index');
    Route::get('/nasabah/detail', 'show')->name('nasabah.show');
});

Route::controller(transaksiController::class)->group(function () {

    Route::get("/", 'index')->name('transaksi.index');
    Route::get("/transaksi/detail", 'show')->name('transaksi.show');

    // create
    Route::get('/transaksi/create', 'create')->name('transaksi.create');
    Route::post("/transaksi/create", 'store')->name("transaksi.store");

    // Update
    Route::get('/transaksi/edit','edit')->name('transaksi.edit');
    // Route::put('/transaksi/{transaksi:slug}', 'update')->name('transaksi.update');

    // Delete
    Route::delete('/transaksi/delete', 'destroy')->name('transaksi.delete');

    Route::get('/auth',[AuthController::class, 'index'])->name('login');
    Route::post('/auth',[AuthController::class, 'login'])->name('login.auth');

});
