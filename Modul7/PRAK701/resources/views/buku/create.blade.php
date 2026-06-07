@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Tambah Buku</h2>
            <p class="mt-1 text-sm text-slate-600">Isi data buku dengan lengkap dan benar.</p>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft ring-1 ring-slate-200 sm:p-8">
            <form action="{{ route('buku.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="judul_buku">Judul Buku <span class="text-red-500">*</span></label>
                    <input id="judul_buku" name="judul_buku" type="text" value="{{ old('judul_buku') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100" required>
                    @error('judul_buku')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="penulis">Penulis <span class="text-red-500">*</span></label>
                    <input id="penulis" name="penulis" type="text" value="{{ old('penulis') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100" required>
                    @error('penulis')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="penerbit">Penerbit <span class="text-red-500">*</span></label>
                    <input id="penerbit" name="penerbit" type="text" value="{{ old('penerbit') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100" required>
                    @error('penerbit')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="tahun_terbit">Tahun Terbit <span class="text-red-500">*</span></label>
                    <input id="tahun_terbit" name="tahun_terbit" type="number" min="1801" max="2023" value="{{ old('tahun_terbit') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100" required>
                    @error('tahun_terbit')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">Simpan</button>
                    <a href="{{ route('buku.index') }}" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection