@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Edit Peminjaman</h2>
            <p class="mt-1 text-sm text-slate-600">Perbarui transaksi peminjaman.</p>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft ring-1 ring-slate-200 sm:p-8">
            <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700" for="tgl_pinjam">Tgl Pinjam <span class="text-red-500">*</span></label>
                        <input id="tgl_pinjam" name="tgl_pinjam" type="date" value="{{ old('tgl_pinjam', \Illuminate\Support\Carbon::parse($peminjaman->tgl_pinjam)->format('Y-m-d')) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('tgl_pinjam') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('tgl_pinjam')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700" for="tgl_kembali">Tgl Kembali <span class="text-red-500">*</span></label>
                        <input id="tgl_kembali" name="tgl_kembali" type="date" value="{{ old('tgl_kembali', \Illuminate\Support\Carbon::parse($peminjaman->tgl_kembali)->format('Y-m-d')) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('tgl_kembali') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('tgl_kembali')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="id_member">Member <span class="text-red-500">*</span></label>
                    <select id="id_member" name="id_member" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('id_member') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        <option value="">-- Pilih Member --</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id_member }}" @selected(old('id_member', $peminjaman->id_member) == $member->id_member)>{{ $member->nomor_member }} - {{ $member->nama_member }}</option>
                        @endforeach
                    </select>
                    @error('id_member')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="id_buku">Buku <span class="text-red-500">*</span></label>
                    <select id="id_buku" name="id_buku" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('id_buku') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id_buku }}" @selected(old('id_buku', $peminjaman->id_buku) == $buku->id_buku)>{{ $buku->judul_buku }} - {{ $buku->penulis }}</option>
                        @endforeach
                    </select>
                    @error('id_buku')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">Update</button>
                    <a href="{{ route('peminjaman.index') }}" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection