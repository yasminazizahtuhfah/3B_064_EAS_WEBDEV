<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [barangController::class, 'create'])->name('barang.create');
Route::post('/barang', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}/edit', [barangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [barangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [barangController::class, 'destroy'])->name('barang.destroy');
