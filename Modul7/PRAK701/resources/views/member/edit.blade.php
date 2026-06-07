@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Edit Member</h2>
            <p class="mt-1 text-sm text-slate-600">Perbarui data anggota perpustakaan.</p>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft ring-1 ring-slate-200 sm:p-8">
            <form action="{{ route('member.update', $member) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="nama_member">Nama Member <span class="text-red-500">*</span></label>
                    <input id="nama_member" name="nama_member" type="text" value="{{ old('nama_member', $member->nama_member) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('nama_member') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                    @error('nama_member')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="nomor_member">Nomor Member <span class="text-red-500">*</span></label>
                    <input id="nomor_member" name="nomor_member" type="text" value="{{ old('nomor_member', $member->nomor_member) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('nomor_member') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                    @error('nomor_member')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700" for="alamat">Alamat <span class="text-red-500">*</span></label>
                    <textarea id="alamat" name="alamat" rows="4" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('alamat') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>{{ old('alamat', $member->alamat) }}</textarea>
                    @error('alamat')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700" for="tgl_mendaftar">Tgl Mendaftar <span class="text-red-500">*</span></label>
                        <input id="tgl_mendaftar" name="tgl_mendaftar" type="datetime-local" value="{{ old('tgl_mendaftar', \Illuminate\Support\Carbon::parse($member->tgl_mendaftar)->format('Y-m-d\TH:i')) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('tgl_mendaftar') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('tgl_mendaftar')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700" for="tgl_terakhir_bayar">Tgl Terakhir Bayar <span class="text-red-500">*</span></label>
                        <input id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" type="date" value="{{ old('tgl_terakhir_bayar', \Illuminate\Support\Carbon::parse($member->tgl_terakhir_bayar)->format('Y-m-d')) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('tgl_terakhir_bayar') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('tgl_terakhir_bayar')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">Update</button>
                    <a href="{{ route('member.index') }}" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection