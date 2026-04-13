<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Route untuk halaman utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// 2. Route untuk cek resi
Route::get('/cek-resi', [ServiceController::class, 'tracking'])->name('service.tracking');

// 3. Route untuk form pendaftaran service
Route::get('/service/input', [ServiceController::class, 'create'])->name('service.create');

// Route untuk halaman Login
Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');

// Route untuk halaman Register
Route::get('/register', function () {
    return view('auth.register'); 
})->name('register');