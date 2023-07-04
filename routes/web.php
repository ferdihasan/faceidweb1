<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CreatefaceidController;
use App\Http\Controllers\AdministratorController;


Route::get('/', [HomeController::class, 'index'])->name('login');

Route::get('administrator', [AdministratorController::class, 'index'])->middleware('auth');
Route::post('administrator', [AdministratorController::class, 'index'])->middleware('auth');
Route::get('tambah-karyawan', [AdministratorController::class, 'tambahKaryawan'])->middleware('auth');
Route::post('hapus-karyawan/{id}', [AdministratorController::class, 'hapusKaryawan'])->middleware('auth');
Route::post('form-tambah-karyawan', [AdministratorController::class, 'simpanKaryawan'])->middleware('auth');
Route::get('edit-karyawan/{id}', [AdministratorController::class, 'editKaryawan'])->middleware('auth');
Route::post('edit-karyawan/{id}', [AdministratorController::class, 'editKaryawan'])->middleware('auth');
Route::post('edit-karyawan/form-edit-karyawan/{id}', [AdministratorController::class, 'simpanUpdateKaryawan'])->middleware('auth');


Route::get('daftar-absensi', [AbsensiController::class, 'daftarAbsensi'])->middleware('auth');
// Route::post('daftar-absensi', [AbsensiController::class, 'index'])->middleware('auth');
Route::post('hapus-absensi/{id}', [AbsensiController::class, 'hapusAbsensi'])->middleware('auth');
Route::post('edit-absensi/{id}', [AbsensiController::class, 'editAbsensi'])->middleware('auth');
Route::post('edit-absensi/form-edit-absensi/{id}', [AbsensiController::class, 'simpanAbsensi'])->middleware('auth');
Route::get('tambah-absensi', [AbsensiController::class, 'tambahAbsensi'])->middleware('auth');
Route::post('form-tambah-absensi', [AbsensiController::class, 'submitTambahAbsensi'])->middleware('auth');

Route::get('createfaceid', [CreatefaceidController::class, 'index'])->middleware('auth');
Route::post('createfaceid/{id}',[CreatefaceidController::class, 'saveFaceId'])->middleware('auth');
Route::get('hapus-faceid/{id}', [CreatefaceidController::class, 'hapusFaceid'])->middleware('auth');


Route::get('absensi', [AbsensiController::class, 'index']);
// Route::post('absensi', [AbsensiController::class, 'index']);
Route::post('submitAbsensiFaceId', [AbsensiController::class, 'submitAbsensiFaceId']);
//login
// Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'autenticate'])->middleware('guest');
//logout
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');
