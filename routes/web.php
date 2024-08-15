<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PegawaiMiddleware;

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/absen', [AdminController::class, 'absenView']);
    Route::get('/pegawai', [AdminController::class, 'pegawaiView']);
    Route::get('/admin', [AdminController::class, 'adminView']);
    Route::get('/gaji-pegawai', [AdminController::class, 'gajiPegawaiView']);
    Route::post('/adminStore', [AdminController::class, 'addAdmin'])->name('admin.store');
    Route::post('/editAdmin', [AdminController::class, 'editAdmin']);
    Route::post('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin']);
    Route::post('/addPegawai', [AdminController::class, 'tambahPegawai']);
    Route::post('/editPegawai', [AdminController::class, 'editPegawai']);
    Route::post('/deletePegawai/{id}', [AdminController::class, 'deletePegawai']);
    Route::get("/cetakGajiBulanan", [AdminController::class, 'cetakGajiBulanan']);
    Route::get("/cetakAbsenBulanan", [AdminController::class, 'cetakAbsenBulanan']);
    Route::get("/cetakPegawai", [AdminController::class, 'cetakPegawai']);
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/loginStore', [AuthController::class, 'loginStore']);
Route::get('/pilih-pegawai', [PegawaiController::class, 'select']);

Route::get('/pegawai-absen', [PegawaiController::class, 'index']);
Route::get('/pegawai-history', [PegawaiController::class, 'history']);
Route::post('/absenMasuk/{id}', [PegawaiController::class, 'absenMasuk']);
Route::post('/absenKeluar/{id}', [PegawaiController::class, 'absenKeluar']);
