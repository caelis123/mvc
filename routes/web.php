<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

// ─── Publik ───────────────────────────────────────────
Route::get('/', fn() => view('welcome'));
Route::get('/cek-resi', [ServiceController::class, 'tracking'])->name('service.tracking');
Route::get('/service/input', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');

// ─── Auth ─────────────────────────────────────────────
Route::get('/login',    [AuthController::class, 'loginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.post');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// ─── Pelanggan (harus login) ──────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/riwayat', [ServiceController::class, 'riwayat'])->name('pelanggan.riwayat');
});

// ─── Admin (harus login + role admin) ────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',                   [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/service/{service}/status',   [AdminController::class, 'updateStatus'])->name('service.status');
    Route::delete('/service/{service}',        [AdminController::class, 'destroy'])->name('service.destroy');
});