<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // Menampilkan halaman detail pengalaman berdasarkan ID
    public function detail($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('detail', compact('kegiatan'));
    }

    // Fungsi untuk memperbarui dokumentasi kegiatan saja
    public function updateDokumentasi(Request $request, $id)
    {
        $request->validate([
            'kegiatan_dokumentasi' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if (! $request->hasFile('kegiatan_dokumentasi') || ! $request->file('kegiatan_dokumentasi')->isValid()) {
            return redirect()->route('detail.pengalaman', $id)->withErrors(['kegiatan_dokumentasi' => 'Silakan pilih file dokumentasi terlebih dahulu.']);
        }

        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->kegiatan_dokumentasi && Storage::disk('public')->exists($kegiatan->kegiatan_dokumentasi)) {
            Storage::disk('public')->delete($kegiatan->kegiatan_dokumentasi);
        }

        $file = $request->file('kegiatan_dokumentasi');
        $filename = uniqid('kegiatan-dokumentasi-', true).'.'.$file->getClientOriginalExtension();
        $directory = storage_path('app/public/kegiatan-dokumentasi');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file->move($directory, $filename);
        $path = 'kegiatan-dokumentasi/'.$filename;
        $kegiatan->update(['kegiatan_dokumentasi' => $path]);

        return redirect()->route('detail.pengalaman', $kegiatan->id)->with('success', 'Berhasil');
    }
}
