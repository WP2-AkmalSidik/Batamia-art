<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LaporanPenjualanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// Route::middleware('role:admin')->group(function () {
//     Route::prefix('admin')->group(function () {

Route::resource('/kategori', App\Http\Controllers\Admin\KategoriController::class)->names('kategori');
Route::resource('/produk', App\Http\Controllers\Admin\ProdukController::class)->names('produk');
Route::resource('/pesanan', App\Http\Controllers\Admin\PesananController::class)->names('pesanan');
Route::resource('/pengguna', App\Http\Controllers\Admin\PenggunaController::class)->names('pengguna');
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
Route::post('/pengaturan/bank', [PengaturanController::class, 'storeBank'])->name('bank.store');
Route::get('/pengaturan/bank/{id}', [PengaturanController::class, 'showBank'])->name('bank.show');
Route::put('/pengaturan/bank/{id}', [PengaturanController::class, 'updateBank'])->name('bank.update');
Route::put('/pengaturan/bank/{id}/status', [PengaturanController::class, 'updateStatusBank'])->name('bank.status');

//     });
// });

Route::prefix('wilayah')->name('wilayah.')->group(function () {

    // Basic wilayah endpoints
    Route::get('provinsi', [WilayahController::class, 'getProvinsi'])->name('provinsi');
    Route::get('kota/{provinsi_id}', [WilayahController::class, 'getKota'])->name('kota');
    Route::get('kecamatan/{kota_id}', [WilayahController::class, 'getKecamatan'])->name('kecamatan');
    Route::get('kelurahan/{kecamatan_id}', [WilayahController::class, 'getKelurahan'])->name('kelurahan');

    // Advanced endpoints
    Route::get('search', [WilayahController::class, 'searchWilayah'])->name('search');
    Route::get('lengkap', [WilayahController::class, 'getWilayahLengkap'])->name('lengkap');

    // Admin/Maintenance endpoints (optional: add middleware for admin only)
    Route::delete('cache', [WilayahController::class, 'clearCache'])->name('clear-cache');
    Route::get('status', [WilayahController::class, 'getApiStatus'])->name('status');

});
