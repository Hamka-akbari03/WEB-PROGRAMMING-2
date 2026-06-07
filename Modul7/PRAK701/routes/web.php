<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('member.index')
        : redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('member', MemberController::class)->except(['show']);
    Route::resource('buku', BukuController::class)->except(['show']);
    Route::resource('peminjaman', PeminjamanController::class)->except(['show']);
});
