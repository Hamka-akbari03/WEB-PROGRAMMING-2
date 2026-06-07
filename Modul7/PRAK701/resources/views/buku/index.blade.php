@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Data Buku</h2>
            <p class="mt-1 text-sm text-slate-600">Daftar buku yang tersedia di perpustakaan.</p>
        </div>
        <a href="{{ route('buku.create') }}" class="inline-flex items-center justify-center rounded-xl bg-brand-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">Tambah Data</a>
    </div>

    <div class="overflow-hidden rounded-3xl bg-white shadow-soft ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 font-semibold">No</th>
                        <th class="px-4 py-3 font-semibold">Judul Buku</th>
                        <th class="px-4 py-3 font-semibold">Penulis</th>
                        <th class="px-4 py-3 font-semibold">Penerbit</th>
                        <th class="px-4 py-3 font-semibold">Tahun Terbit</th>
                        <th class="px-4 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($bukus as $buku)
                        <tr class="hover:bg-slate-50/70">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $buku->judul_buku }}</td>
                            <td class="px-4 py-3">{{ $buku->penulis }}</td>
                            <td class="px-4 py-3">{{ $buku->penerbit }}</td>
                            <td class="px-4 py-3">{{ $buku->tahun_terbit }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="inline-flex gap-2">
                                    <a href="{{ route('buku.edit', $buku) }}" class="rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-indigo-700">Edit</a>
                                    <form action="{{ route('buku.destroy', $buku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-500">Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 px-4 py-4">
            {{ $bukus->links() }}
        </div>
    </div>
@endsection