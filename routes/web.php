<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LaporanPenjualanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DetailProdukController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

});

Route::middleware('role:admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan.index');

    Route::resource('/kategori', App\Http\Controllers\Admin\KategoriController::class)->names('kategori');
    Route::resource('admin/produk', App\Http\Controllers\Admin\ProdukController::class)->names('admin.produk');
    Route::resource('admin/pesanan', App\Http\Controllers\Admin\PesananController::class)->names('admin.pesanan');
    Route::put('/pesanan/{id}/status', [App\Http\Controllers\Admin\PesananController::class, 'updateStatus'])->name('admin.pesanan.update.status');

    Route::resource('/pengguna', App\Http\Controllers\Admin\PenggunaController::class)->names('pengguna');
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');

    Route::post('/pengaturan/update', [PengaturanController::class, 'updatePengaturan'])->name('pengaturan.update');

    Route::post('/pengaturan/bank', [PengaturanController::class, 'storeBank'])->name('bank.store');
    Route::get('/pengaturan/bank/{id}', [PengaturanController::class, 'showBank'])->name('bank.show');
    Route::put('/pengaturan/bank/{id}', [PengaturanController::class, 'updateBank'])->name('bank.update');
    Route::put('/pengaturan/bank/{id}/status', [PengaturanController::class, 'updateStatusBank'])->name('bank.status');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/keranjang', App\Http\Controllers\User\KeranjangController::class)->names('keranjang');
    Route::post('/keranjang/{id}/kuantitas', [App\Http\Controllers\User\KeranjangController::class, 'updateKuantitas'])->name('keranjang.update.kuantitas');

    Route::resource('/pesanan', App\Http\Controllers\User\PesananController::class)->names('pesanan');
    Route::post('/pesanan/pembayaran', [App\Http\Controllers\User\PesananController::class, 'updatePembayaran'])->name('pesanan.update.pembayaran');
});

Route::prefix('wilayah')->name('wilayah.')->group(function () {
    // Basic wilayah endpoints
    Route::get('provinsi', [WilayahController::class, 'getProvinsi'])->name('provinsi');
    Route::get('kota/{provinsi_id}', [WilayahController::class, 'getKota'])->name('kota');
    Route::get('kecamatan/{kota_id}', [WilayahController::class, 'getKecamatan'])->name('kecamatan');
    Route::get('kelurahan/{kecamatan_id}', [WilayahController::class, 'getKelurahan'])->name('kelurahan');

    Route::get('tujuan', [App\Http\Controllers\KurirController::class, 'getDestination'])->name('tujuan');
    Route::get('ongkir', [App\Http\Controllers\KurirController::class, 'getOngkir'])->name('ongkir');

    // Advanced endpoints
    Route::get('search', [WilayahController::class, 'searchWilayah'])->name('search');
    Route::get('lengkap', [WilayahController::class, 'getWilayahLengkap'])->name('lengkap');

    // Admin/Maintenance endpoints (optional: add middleware for admin only)
    Route::delete('cache', [WilayahController::class, 'clearCache'])->name('clear-cache');
    Route::get('status', [WilayahController::class, 'getApiStatus'])->name('status');
});

// User Routes
Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/detail-produk', [DetailProdukController::class, 'index'])->name('user.detail');
Route::view('/masuk', 'pages.login');
Route::view('/signin', 'pages.signin');

Route::get('/produk', [UserDashboardController::class, 'index'])->name('user.produk');
Route::get('/produk/{id}/detail', [UserDashboardController::class, 'show'])->name('user.produk.detail');
Route::get('/produk/{id}', [UserDashboardController::class, 'detailProduk'])->name('user.detail-produk');
Route::view('/list-pesanan', 'pages/user/list-pesanan');
Route::view('/profile', 'pages/user/profile');
