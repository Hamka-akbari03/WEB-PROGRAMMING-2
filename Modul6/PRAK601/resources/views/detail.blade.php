<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengalaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute left-1/2 top-0 h-96 w-96 -translate-x-1/2 rounded-full bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute right-0 top-1/4 h-96 w-96 rounded-full bg-indigo-500/15 blur-3xl"></div>
    </div>

    @php
        $placeholderImage = asset('storage/placeholder-profile.svg');
        $fotoKegiatan = !empty($kegiatan?->kegiatan_dokumentasi) && \Illuminate\Support\Facades\Storage::disk('public')->exists($kegiatan->kegiatan_dokumentasi)
            ? asset('storage/' . $kegiatan->kegiatan_dokumentasi)
            : $placeholderImage;
    @endphp

    <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/75 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('beranda') }}" class="group flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-cyan-400/15 ring-1 ring-inset ring-cyan-300/30 transition duration-300 group-hover:scale-105 group-hover:bg-cyan-400/20">
                    <span class="h-3 w-3 rounded-full bg-cyan-300"></span>
                </span>
                <div>
                    <p class="text-sm font-semibold tracking-[0.3em] text-cyan-200 uppercase">Praktikan</p>
                    <p class="text-sm text-slate-400">Portfolio MVC Laravel 12</p>
                </div>
            </a>

            <div class="flex items-center gap-2 rounded-full border border-white/10 bg-white/5 p-1 shadow-lg shadow-cyan-950/20">
                <a href="{{ route('beranda') }}" class="rounded-full px-4 py-2 text-sm font-medium text-slate-200 transition hover:bg-white/10 hover:text-white">Beranda</a>
                <a href="{{ route('profil') }}" class="rounded-full px-4 py-2 text-sm font-medium text-slate-200 transition hover:bg-white/10 hover:text-white">Profil</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                {{ session('success') }}
            </div>
        @endif

        @error('kegiatan_dokumentasi')
            <div class="mb-6 rounded-2xl border border-rose-400/20 bg-rose-400/10 px-4 py-3 text-sm text-rose-100">
                {{ $message }}
            </div>
        @enderror

        <section class="grid gap-8 lg:grid-cols-12">
            <div class="lg:col-span-7">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/40 backdrop-blur-xl sm:p-8 lg:p-10">
                    <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-200">Detail Pengalaman</p>
                    <h1 class="mt-4 text-3xl font-black leading-tight text-white sm:text-4xl lg:text-5xl">{{ $kegiatan->kegiatan_judul }}</h1>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-2 text-sm text-cyan-100">Waktu: {{ $kegiatan->kegiatan_waktu }}</span>
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200">ID Data #{{ $kegiatan->id }}</span>
                    </div>

                    <div class="mt-8 space-y-6 text-base leading-8 text-slate-300 sm:text-lg">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Deskripsi Lengkap</p>
                            <p class="mt-3">{{ $kegiatan->kegiatan_deskripsi }}</p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5">
                                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-cyan-200">Waktu Pelaksanaan</p>
                                <p class="mt-3 text-lg font-semibold text-white">{{ $kegiatan->kegiatan_waktu }}</p>
                            </div>
                            <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5">
                                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-cyan-200">Kesan yang Dirasakan</p>
                                <p class="mt-3 text-lg font-semibold text-white">{{ $kegiatan->kegiatan_kesan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6">
                <form action="{{ route('detail.dokumentasi.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 p-4 shadow-2xl shadow-slate-950/40 backdrop-blur-xl">
                    @csrf
                    <input id="kegiatan_dokumentasi" name="kegiatan_dokumentasi" type="file" accept="image/*" class="hidden">

                    <div class="rounded-[1.5rem] border border-white/10 bg-slate-900/70 p-4 transition duration-300">
                        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Dokumentasi Kegiatan</p>

                        <label for="kegiatan_dokumentasi" class="group block cursor-pointer">
                            <div class="aspect-video overflow-hidden rounded-[1.25rem] bg-slate-900 ring-1 ring-white/10 transition duration-300 group-hover:ring-cyan-400/40">
                                <img id="dokumentasiPreview" src="{{ $fotoKegiatan }}" alt="Dokumentasi Kegiatan" class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]">
                            </div>
                        </label>

                        <div class="mt-4 flex flex-wrap items-center gap-3">
                            <label for="kegiatan_dokumentasi" class="inline-flex cursor-pointer items-center justify-center rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/15">
                                Pilih Foto
                            </label>
                            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                                Simpan Dokumentasi
                            </button>
                        </div>

                        <p id="dokumentasiName" class="mt-3 text-sm text-slate-400">Belum ada file baru dipilih.</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.25em] text-slate-500">Klik gambar atau tombol pilih foto untuk mengganti.</p>
                    </div>
                </form>

                <a href="{{ route('profil') }}" class="inline-flex w-full items-center justify-center rounded-full bg-cyan-400 px-6 py-4 text-sm font-semibold text-slate-950 transition duration-300 hover:-translate-y-0.5 hover:bg-cyan-300">
                    Kembali ke Profil
                </a>
            </div>
        </section>
    </main>

    <script>
        const dokumentasiInput = document.getElementById('kegiatan_dokumentasi');
        const dokumentasiPreview = document.getElementById('dokumentasiPreview');
        const dokumentasiName = document.getElementById('dokumentasiName');

        if (dokumentasiInput && dokumentasiPreview && dokumentasiName) {
            dokumentasiInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    dokumentasiName.textContent = 'Belum ada file baru dipilih.';
                    return;
                }

                dokumentasiName.textContent = file.name;
                dokumentasiPreview.src = URL.createObjectURL(file);
            });
        }
    </script>
</body>
</html>