<?php

use App\Http\Controllers\{DashboardController,KategoriController,SatuanController,BarangController};
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kategori', KategoriController::class)->except('show');
Route::resource('satuan', SatuanController::class)->except('show');
Route::resource('barang', BarangController::class)->except('show');
