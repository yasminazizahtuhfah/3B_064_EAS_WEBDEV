<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\tenanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [barangController::class, 'create'])->name('barang.create');
Route::post('/barang', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}/edit', [barangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [barangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [barangController::class, 'destroy'])->name('barang.destroy');

Route::get('/kasir', [kasirController::class, 'index'])->name('kasir.index');
Route::get('/kasir/create', [kasirController::class, 'create'])->name('kasir.create');
Route::post('/kasir', [kasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir/{id}/edit', [kasirController::class, 'edit'])->name('kasir.edit');
Route::put('/kasir/{id}', [kasirController::class, 'update'])->name('kasir.update');
Route::delete('/kasir/{id}', [kasirController::class, 'destroy'])->name('kasir.destroy');

Route::get('/tenan', [tenanController::class, 'index'])->name('tenan.index');
Route::get('/tenan/create', [tenanController::class, 'create'])->name('tenan.create');
Route::post('/tenan', [tenanController::class, 'store'])->name('tenan.store');
Route::get('/tenan/{id}/edit', [tenanController::class, 'edit'])->name('tenan.edit');
Route::put('/tenan/{id}', [tenanController::class, 'update'])->name('tenan.update');
Route::delete('/tenan/{id}', [tenanController::class, 'destroy'])->name('tenan.destroy');