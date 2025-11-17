<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\NewsController;

// Halaman utama & berita publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{news}', [HomeController::class, 'show'])->name('news.show');

// Auth admin
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Grup route admin (hanya admin)
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

        // CRUD berita
        Route::resource('news', NewsController::class);
    });

Route::fallback(function () {
    return view('errors.404');
});

