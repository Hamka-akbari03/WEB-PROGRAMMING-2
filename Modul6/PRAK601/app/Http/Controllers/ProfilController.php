<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // Fungsi untuk mengatur Halaman Beranda
    public function index()
    {
        // Mengambil baris data pertama dari tabel profils di database
        // Ini untuk mendapatkan Nama dan NIM praktikan yang diminta soal
        $profil = Profil::first();

        // Mengirim data profil ke file view bernama beranda
        return view('beranda', compact('profil'));
    }

    // Fungsi untuk mengatur Halaman Profil
    public function profil()
    {
        // Mengambil data pertama untuk mengisi biodata lengkap praktikan
        $profil = Profil::with('kegiatans')->first();

        // Mengambil 4 data kegiatan terbaru untuk grid pengalaman kuliah
        $kegiatan = $profil ? $profil->kegiatans()->latest()->take(4)->get() : collect();

        // Mengirim data ke file view bernama profil
        return view('profil', compact('profil', 'kegiatan'));
    }

    // Fungsi untuk memperbarui foto profil saja
    public function updateFotoProfil(Request $request)
    {
        $request->validate([
            'foto_profil' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if (! $request->hasFile('foto_profil') || ! $request->file('foto_profil')->isValid()) {
            return redirect()->route('profil')->withErrors(['foto_profil' => 'Silakan pilih file foto profil terlebih dahulu.']);
        }

        $profil = Profil::firstOrFail();

        if ($profil->foto_profil && Storage::disk('public')->exists($profil->foto_profil)) {
            Storage::disk('public')->delete($profil->foto_profil);
        }

        $file = $request->file('foto_profil');
        $filename = uniqid('foto-profil-', true).'.'.$file->getClientOriginalExtension();
        $directory = storage_path('app/public/profil-foto');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file->move($directory, $filename);
        $path = 'profil-foto/'.$filename;
        $profil->update(['foto_profil' => $path]);

        return redirect()->route('profil')->with('success', 'Berhasil');
    }
}