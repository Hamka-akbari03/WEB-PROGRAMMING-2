@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Data Peminjaman</h2>
            <p class="mt-1 text-sm text-slate-600">Daftar transaksi peminjaman buku.</p>
        </div>
        <a href="{{ route('peminjaman.create') }}" class="inline-flex items-center justify-center rounded-xl bg-brand-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">Tambah Data</a>
    </div>

    <div class="overflow-hidden rounded-3xl bg-white shadow-soft ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 font-semibold">No</th>
                        <th class="px-4 py-3 font-semibold">Tgl Pinjam</th>
                        <th class="px-4 py-3 font-semibold">Tgl Kembali</th>
                        <th class="px-4 py-3 font-semibold">Member</th>
                        <th class="px-4 py-3 font-semibold">Buku</th>
                        <th class="px-4 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($peminjamans as $peminjaman)
                        <tr class="hover:bg-slate-50/70">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ \Illuminate\Support\Carbon::parse($peminjaman->tgl_pinjam)->format('d-m-Y') }}</td>
                            <td class="px-4 py-3">{{ \Illuminate\Support\Carbon::parse($peminjaman->tgl_kembali)->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $peminjaman->member?->nama_member }}</td>
                            <td class="px-4 py-3">{{ $peminjaman->buku?->judul_buku }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="inline-flex gap-2">
                                    <a href="{{ route('peminjaman.edit', $peminjaman) }}" class="rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-indigo-700">Edit</a>
                                    <form action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-500">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 px-4 py-4">
            {{ $peminjamans->links() }}
        </div>
    </div>
@endsection