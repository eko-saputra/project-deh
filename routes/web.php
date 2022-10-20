<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiayaSppController;
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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// USER
Route::get('pengaturan', [UserController::class, 'pengaturan'])->name('pengaturan');
Route::post('pengaturan-action', [UserController::class, 'pengaturanAction'])->name('pengaturan.action');
Route::get('register', [UserController::class, 'register'])->name('register');
// Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password-action', [UserController::class, 'passwordAction'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// SISWA
Route::get('data-siswa', [SiswaController::class, 'dataSiswa'])->name('data.siswa');
Route::get('tambah-siswa', [SiswaController::class, 'tambahSiswa'])->name('tambah.siswa');
Route::post('tambah-siswa-action', [SiswaController::class, 'tambahSiswaAction'])->name('tambah.siswa.action');
Route::get('detail-siswa/{id}', [SiswaController::class, 'detailSiswa'])->name('detail.siswa');
Route::get('ubah-siswa/{id}', [SiswaController::class, 'ubahSiswa'])->name('ubah.siswa');
Route::post('ubah-siswa-action', [SiswaController::class, 'ubahSiswaAction'])->name('ubah.siswa.action');
Route::get('hapus-siswa/{id}', [SiswaController::class, 'hapusSiswa'])->name('hapus.siswa');

// LEVEL
Route::get('data-level', [LevelController::class, 'dataLevel'])->name('data.level');
Route::get('tambah-level', [LevelController::class, 'tambahLevel'])->name('tambah.level');
Route::post('tambah-level-action', [LevelController::class, 'tambahLevelAction'])->name('tambah.level.action');
Route::get('ubah-level/{id}', [LevelController::class, 'ubahLevel'])->name('ubah.level');
Route::post('ubah-level-action', [LevelController::class, 'ubahLevelAction'])->name('ubah.level.action');
Route::get('hapus-level/{id}', [LevelController::class, 'hapusLevel'])->name('hapus.level');

// SPP
Route::get('data-spp', [SppController::class, 'dataSpp'])->name('data.spp');
Route::get('tambah-spp', [SppController::class, 'tambahSpp'])->name('tambah.spp');
Route::post('tambah-spp-action', [SppController::class, 'tambahSppAction'])->name('tambah.spp.action');
Route::get('ubah-spp/{id}', [SppController::class, 'ubahSpp'])->name('ubah.Spp');
Route::post('ubah-spp-action', [SppController::class, 'ubahSppAction'])->name('ubah.spp.action');
Route::get('hapus-spp/{id}', [SppController::class, 'hapusSpp'])->name('hapus.Spp');

// TAGIHAN
Route::get('pembayaran', [TagihanController::class, 'transaksiPembayaran'])->name('transaksi.pembayaran');
Route::get('data-pembayaran', [TagihanController::class, 'dataPembayaran'])->name('data.pembayaran');
Route::post('pembayaran-action', [TagihanController::class, 'transaksiPembayaranAction'])->name('pembayaran.action');
Route::get('nominal', [TagihanController::class, 'nominalSpp'])->name('nominal.spp');
Route::get('cari-siswa/{no}', [TagihanController::class, 'cariSiswa'])->name('cari.siswa');
Route::get('cari-tagihan/{no}', [TagihanController::class, 'cariTagihan'])->name('cari.tagihan');
Route::get('cetak/{no}/{bln}/{bayar}', [TagihanController::class, 'Cetak'])->name('cetak');


use App\Http\Controllers\PDFController;

Route::get('create-pdf-file', [PDFController::class, 'index']);
