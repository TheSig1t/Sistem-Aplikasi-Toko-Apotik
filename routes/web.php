<?php

use App\Models\pelanggan;
use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\pelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [admin::class, 'indexPenjualan1']);
Route::post('postRegister', [admin::class, 'postRegister']);

Route::group(['middleware' => 'is_admin'], function () {
    // Penjualan
    Route::get('indexPenjualan', [admin::class, 'indexPenjualan']);
    Route::get('viewInsertPenjualan', [admin::class, 'viewInsertPenjualan']);
    Route::post('postInsertPenjualan', [admin::class, 'postInsertPenjualan']);
    Route::get('viewUpdatePenjualan/{ID_PENJUALAN}', [admin::class, 'viewUpdatePenjualan']);
    Route::patch('postInsertPenjualan/{ID_PENJUALAN}', [admin::class, 'postUpdatePenjualan']);
    Route::get('deletePenjualan/{ID_PENJUALAN}', [admin::class, 'deletePenjualan']);

    // Kategori
    Route::get('indexKategori', [admin::class, 'indexKategori']);
    Route::get('viewInsertKategori', [admin::class, 'viewInsertKategori']);
    Route::post('postInsertKategori', [admin::class, 'postInsertKategori']);
    Route::get('viewUpdateKategori/{ID_KATEGORI}', [admin::class, 'viewUpdateKategori']);
    Route::patch('postInsertKategori/{ID_KATEGORI}', [admin::class, 'postUpdateKategori']);
    Route::get('deleteKategori/{ID_KATEGORI}', [admin::class, 'deleteKategori']);

    // Obat
    Route::get('indexObat', [admin::class, 'indexObat']);
    Route::get('viewInsertObat', [admin::class, 'viewInsertObat']);
    Route::post('postInsertObat', [admin::class, 'postInsertObat']);
    Route::get('viewUpdateObat/{KODE_OBAT}', [admin::class, 'viewUpdateObat']);
    Route::patch('postInsertObat/{KODE_OBAT}', [admin::class, 'postUpdateObat']);
    Route::get('deleteObat/{KODE_OBAT}', [admin::class, 'deleteObat']);

    // pembayaran
    Route::get('indexPembayaran', [admin::class, 'indexPembayaran']);
    Route::get('viewInsertPembayaran', [admin::class, 'viewInsertPembayaran']);
    Route::post('postInsertPembayaran', [admin::class, 'postInsertPembayaran']);
    Route::get('viewUpdatePembayaran/{ID_PEMBAYARAN}', [admin::class, 'viewUpdatePembayaran']);
    Route::patch('postInsertPembayaran/{ID_PEMBAYARAN}', [admin::class, 'postUpdatePembayaran']);
    Route::get('deletePembayaran/{ID_PEMBAYARAN}', [admin::class, 'deletePembayaran']);

    // User
    Route::get('indexUser', [admin::class, 'indexUser']);
    Route::get('viewInsertUser', [admin::class, 'viewInsertUser']);
    Route::post('postInsertUser', [admin::class, 'postInsertUser']);
    Route::get('viewUpdateUser/{id}', [admin::class, 'viewUpdateUser']);
    Route::post('postInsertUser/{id}', [admin::class, 'postUpdateUser']);
    Route::get('deleteUser/{id}', [admin::class, 'deleteUser']);

    // History & Cetak
    Route::get('indexDetailAdmin', [admin::class, 'indexDetailAdmin']);
    Route::get('cetakDetail', [admin::class, 'cetakDetail']);
    Route::get('cetakDetailSatuan/{ID_PENJUALAN}', [admin::class, 'cetakDetailSatuan']);
});


Route::group(['middleware' => 'is_petugas'], function () {

    // Penjualan
    Route::get('indexPenjualanPetugas', [petugasController::class, 'indexPenjualanPetugas']);
    Route::get('viewInsertPenjualanPetugas', [petugasController::class, 'viewInsertPenjualanPetugas']);
    Route::post('postInsertPenjualanPetugas', [petugasController::class, 'postInsertPenjualanPetugas']);

    Route::get('viewUpdatePenjualanPetugas/{ID_PENJUALAN}', [petugasController::class, 'viewUpdatePenjualanPetugas']);
    Route::patch('postInsertPenjualanPetugas/{ID_PENJUALAN}', [petugasController::class, 'postUpdatePenjualanPetugas']);
    Route::get('deletePenjualanPetugas/{ID_PENJUALAN}', [petugasController::class, 'deletePenjualanPetugas']);

    // History & Cetak
    Route::get('indexHistoryPenjualanPetugas', [petugasController::class, 'indexHistoryPenjualanPetugas']);

    Route::get('cetakDetailPetugas', [petugasController::class, 'cetakDetailPetugas']);
    Route::get('cetakDetailSatuanPetugas/{ID_PENJUALAN}', [petugasController::class, 'cetakDetailSatuanPetugas']);
});

Route::group(['middleware' => 'is_pelanggan'], function () {
    
    // transaksi
    Route::get('indexPenjualanPelanggan', [pelangganController::class, 'indexPenjualanPelanggan']);
    Route::get('viewInsertPenjualanPelanggan', [pelangganController::class, 'viewInsertPenjualanPelanggan']);
    Route::post('postInsertPenjualanPelanggan', [pelangganController::class, 'postInsertPenjualanPelanggan']);
    
    //Cetak
    // Route::get('cetakDetailPelanggan', [pelangganController::class, 'cetakDetailPelanggan']);
    Route::get('cetakDetailSatuanPelanggan/{ID_PENJUALAN}', [pelangganController::class, 'cetakDetailSatuanPelanggan']);
});
