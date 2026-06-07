@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="w-full max-w-md">
        <div class="overflow-hidden rounded-3xl bg-white shadow-soft ring-1 ring-slate-200">
            <div class="border-b border-slate-100 bg-gradient-to-r from-brand-600 to-indigo-600 px-6 py-5 text-white">
                <p class="text-sm font-medium uppercase tracking-[0.2em] text-brand-100">Modul 7</p>
                <h1 class="mt-2 text-2xl font-bold">Login Sistem Informasi Perpustakaan</h1>
                <p class="mt-1 text-sm text-brand-100">Masuk menggunakan akun yang sudah di-seed untuk pengujian.</p>
            </div>

            <div class="space-y-4 px-6 py-6 sm:px-8">
                @if (session('warning'))
                    <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                        {{ session('warning') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('email') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100 @error('password') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror" required>
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-brand-600 px-4 py-3 font-semibold text-white transition hover:bg-brand-700">Masuk</button>
                </form>

                <div class="rounded-xl bg-slate-50 px-4 py-3 text-sm text-slate-600">
                    Akun uji: <span class="font-semibold text-slate-800">admin@prak701.test</span> / <span class="font-semibold text-slate-800">password</span>
                </div>
            </div>
        </div>
    </div>
@endsection