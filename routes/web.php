<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\{PackageController, TransactionController};
use App\Http\Controllers\TransactionRequestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/paket', [PackageController::class, 'index'])->name('daftar-paket');
Route::get('/paket/tambah', [PackageController::class, 'create'])->name('tambah-paket');
Route::get('/paket/{id}', [PackageController::class, 'edit'])->name('edit-paket');
Route::put('/paket/{id}', [PackageController::class, 'update'])->name('update-paket');
Route::post('/paket/tambah', [PackageController::class, 'store'])->name('simpan-paket');

Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
Route::get('/transaksi/tambah', [TransactionController::class, 'create'])->name('tambah-transaksi');
Route::post('/transaksi/tambah', [TransactionController::class, 'store'])->name('simpan-transaksi');
Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('detail-transaksi');

Route::get('/laporan', [TransactionController::class, 'update'])->name('laporan-keuangan');





Route::get('/barang', [ItemController::class, 'index'])->name('data-barang');
Route::get('/permintaan', [ItemController::class, 'create'])->name('request-barang');
Route::post('/permintaan', [TransactionRequestController::class, 'store'])->name('simpan-request-barang');
Route::get('/histori', [TransactionRequestController::class, 'index'])->name('histori-request');
Route::get('/histori/{id}', [TransactionRequestController::class, 'show'])->name('histori-request-detail');

Route::get('/histori/{id}/cetak_pdf', [TransactionRequestController::class, 'cetak_pdf'])->name('cetak-pdf');
