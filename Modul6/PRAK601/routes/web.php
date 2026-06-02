<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat di mana Anda dapat mendaftarkan rute web untuk aplikasi.
| Rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| diberikan ke grup modul riwayat web yang sama.
|
*/

// Jalur rute untuk Halaman Beranda Utama
// Ketika pengguna mengakses localhost/PRAK601/public/ maka fungsi index di Controller akan berjalan
Route::get('/', [ProfilController::class, 'index'])->name('beranda');

// Jalur rute untuk Halaman Profil Praktikan
// Ketika pengguna mengakses URL /profil maka fungsi profil di Controller akan dipanggil
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');

// Jalur rute untuk memperbarui foto profil saja
Route::post('/profil/foto', [ProfilController::class, 'updateFotoProfil'])->name('profil.foto.update');

// Jalur rute untuk memperbarui dokumentasi kegiatan
Route::post('/detail/{id}/dokumentasi', [KegiatanController::class, 'updateDokumentasi'])->name('detail.dokumentasi.update');

// Jalur rute untuk Halaman Detail Pengalaman Berdasarkan ID Kegiatan
// Tanda kurung kurawal kurung {id} bertindak sebagai parameter dinamis database
Route::get('/detail/{id}', [KegiatanController::class, 'detail'])->name('detail.pengalaman');