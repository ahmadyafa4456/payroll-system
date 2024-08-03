<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [AdminController::class, 'absenView']);
Route::get('/pegawai', [AdminController::class, 'pegawaiView']);
Route::get('/admin', [AdminController::class, 'adminView']);
Route::get('/gaji-pegawai', [AdminController::class, 'gajiPegawaiView']);
Route::post('/adminStore', [AdminController::class, 'addAdmin'])->name('admin.store');

Route::get('/login', [AuthController::class, 'loginView']);