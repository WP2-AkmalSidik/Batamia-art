<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanPenjualanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan.index');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
