<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/absen', [AdminController::class, 'absenView']);
Route::get('/pegawai', [AdminController::class, 'pegawaiView']);
Route::get('/admin', [AdminController::class, 'adminView']);
Route::get('/gaji-pegawai', [AdminController::class, 'gajiPegawaiView']);
Route::post('/adminStore', [AdminController::class, 'addAdmin'])->name('admin.store');
Route::post('/editAdmin', [AdminController::class, 'editAdmin']);
Route::post('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin']);

Route::get('/login', [AuthController::class, 'loginView']);