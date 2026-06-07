<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeminjamanController extends Controller
{
    public function index(): View
    {
        $peminjamans = Peminjaman::with(['member', 'buku'])
            ->latest('id_peminjaman')
            ->paginate(10);

        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create(): View
    {
        return view('peminjaman.create', [
            'members' => Member::orderBy('nama_member')->get(),
            'bukus' => Buku::orderBy('judul_buku')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tgl_pinjam' => ['required', 'date'],
            'tgl_kembali' => ['required', 'date', 'after_or_equal:tgl_pinjam'],
            'id_member' => ['required', 'integer', 'exists:member,id_member'],
            'id_buku' => ['required', 'integer', 'exists:buku,id_buku'],
        ]);

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function edit(Peminjaman $peminjaman): View
    {
        return view('peminjaman.edit', [
            'peminjaman' => $peminjaman,
            'members' => Member::orderBy('nama_member')->get(),
            'bukus' => Buku::orderBy('judul_buku')->get(),
        ]);
    }

    public function update(Request $request, Peminjaman $peminjaman): RedirectResponse
    {
        $validated = $request->validate([
            'tgl_pinjam' => ['required', 'date'],
            'tgl_kembali' => ['required', 'date', 'after_or_equal:tgl_pinjam'],
            'id_member' => ['required', 'integer', 'exists:member,id_member'],
            'id_buku' => ['required', 'integer', 'exists:buku,id_buku'],
        ]);

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman): RedirectResponse
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}