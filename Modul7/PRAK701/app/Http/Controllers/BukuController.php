<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BukuController extends Controller
{
    public function index(): View
    {
        $bukus = Buku::query()
            ->latest('id_buku')
            ->paginate(10);

        return view('buku.index', compact('bukus'));
    }

    public function create(): View
    {
        return view('buku.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'judul_buku' => ['required', 'string'],
                'penulis' => ['required', 'string'],
                'penerbit' => ['required', 'string'],
                'tahun_terbit' => ['required', 'integer', 'between:1801,2023'],
            ],
            [
                'judul_buku.required' => 'Judul buku wajib diisi.',
                'judul_buku.string' => 'Judul buku harus berupa string.',
                'penulis.required' => 'Penulis wajib diisi.',
                'penulis.string' => 'Penulis harus berupa string.',
                'penerbit.required' => 'Penerbit wajib diisi.',
                'penerbit.string' => 'Penerbit harus berupa string.',
                'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
                'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
                'tahun_terbit.between' => 'Tahun terbit harus berada di antara 1801 hingga 2023.',
            ]
        );

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku): View
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku): RedirectResponse
    {
        $validated = $request->validate(
            [
                'judul_buku' => ['required', 'string'],
                'penulis' => ['required', 'string'],
                'penerbit' => ['required', 'string'],
                'tahun_terbit' => ['required', 'integer', 'between:1801,2023'],
            ],
            [
                'judul_buku.required' => 'Judul buku wajib diisi.',
                'judul_buku.string' => 'Judul buku harus berupa string.',
                'penulis.required' => 'Penulis wajib diisi.',
                'penulis.string' => 'Penulis harus berupa string.',
                'penerbit.required' => 'Penerbit wajib diisi.',
                'penerbit.string' => 'Penerbit harus berupa string.',
                'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
                'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
                'tahun_terbit.between' => 'Tahun terbit harus berada di antara 1801 hingga 2023.',
            ]
        );

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku): RedirectResponse
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus.');
    }
}