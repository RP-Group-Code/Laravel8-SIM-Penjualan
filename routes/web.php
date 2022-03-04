<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'logins'])->name('masuk');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['authCheck']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('supliers', SupplierController::class);
    Route::get('/destroy_supliers/{id}', [SupplierController::class, 'destroy'])->name('destroy_supliers');
    Route::resource('barangs', BarangController::class);
    Route::get('/destroy_barangs/{id}', [BarangController::class, 'destroy'])->name('destroy_barangs');
    Route::resource('akuns', AkunController::class);
    Route::get('/destroy_akuns/{id}', [AkunController::class, 'destroy'])->name('destroy_akuns');
    Route::resource('barang_masuks', BarangMasukController::class);
    Route::get('/destroy_barangmasuks/{id}', [BarangMasukController::class, 'destroy'])->name('destroy_barangmasuks');
    Route::resource('barang_keluars', BarangKeluarController::class);
    Route::get('/barang_barangkeluars/{id}', [BarangKeluarController::class, 'destroy'])->name('destroy_barangkeluars');

    Route::get('/laporangbarangkeluar', [BarangKeluarController::class, 'laporan'])->name('laporan_barangkeluars.laporan');
    Route::post('/laporangbarangkeluar', [BarangKeluarController::class, 'cari'])->name('laporan_barangkeluars.cari');

    Route::get('/laporanbarangmasuk', [BarangMasukController::class, 'laporan'])->name('laporan_barangmasuks.laporan');
    // Route::post('/laporanbarangmasuk', [BarangMasukController::class, 'laporan'])->name('laporan_barangmasuks.laporan');
    // Route::post('/laporanbarangmasuk', [BarangMasukController::class, 'cari'])->name('laporan_barangmasuks.cari');;
});
