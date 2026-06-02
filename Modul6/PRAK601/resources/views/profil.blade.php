<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Praktikan</title>
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
    @php
        $fotoProfil = !empty($profil?->foto_profil) && \Illuminate\Support\Facades\Storage::disk('public')->exists($profil->foto_profil)
            ? asset('storage/' . $profil->foto_profil)
            : asset('storage/placeholder-profile.svg');
    @endphp

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute left-0 top-24 h-96 w-96 rounded-full bg-indigo-500/15 blur-3xl"></div>
        <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl"></div>
    </div>

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
                <a href="{{ route('profil') }}" class="rounded-full bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">Profil</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                {{ session('success') }}
            </div>
        @endif

        @error('foto_profil')
            <div class="mb-6 rounded-2xl border border-rose-400/20 bg-rose-400/10 px-4 py-3 text-sm text-rose-100">
                {{ $message }}
            </div>
        @enderror

        <section class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/40 backdrop-blur-xl">
            <div class="grid lg:grid-cols-12">
                <div class="lg:col-span-4">
                    <div class="h-full bg-gradient-to-br from-cyan-400/20 via-slate-900 to-indigo-500/20 p-8 sm:p-10">
                        <p class="text-sm font-medium uppercase tracking-[0.35em] text-cyan-100">Biodata Praktikan</p>
                        <h1 class="mt-4 text-3xl font-black leading-tight text-white sm:text-4xl">Profil lengkap yang tampil tegas, rapi, dan mudah dibaca.</h1>
                        <p class="mt-4 max-w-md text-sm leading-7 text-slate-200/80 sm:text-base">
                            Halaman ini menyajikan data utama praktikan serta empat pengalaman kuliah yang paling berkesan dalam format grid interaktif.
                        </p>

                        <form action="{{ route('profil.foto.update') }}" method="POST" enctype="multipart/form-data" class="mt-8 overflow-hidden rounded-[1.5rem] border border-white/10 bg-slate-950/60 p-4">
                            @csrf
                            <input id="foto_profil" name="foto_profil" type="file" accept="image/*" class="hidden">
                            <label for="foto_profil" class="group block cursor-pointer">
                                <div class="aspect-[4/5] overflow-hidden rounded-[1.25rem] border border-white/10 bg-slate-900 transition duration-300 group-hover:border-cyan-400/40 group-hover:shadow-lg group-hover:shadow-cyan-950/20">
                                    <img id="fotoProfilPreview" src="{{ $fotoProfil }}" alt="Foto Profil" class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]">
                                </div>
                            </label>

                            <div class="mt-4 flex flex-wrap items-center gap-3">
                                <label for="foto_profil" class="inline-flex cursor-pointer items-center justify-center rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/15">
                                    Pilih Foto
                                </label>
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                                    Simpan Foto
                                </button>
                            </div>

                            <p id="fotoProfilName" class="mt-3 text-sm text-slate-400">Belum ada file baru dipilih.</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.25em] text-slate-500">Klik foto atau tombol pilih foto untuk mengganti.</p>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-8 p-6 sm:p-8 lg:p-10">
                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Nama Lengkap</p>
                            <p class="mt-3 text-lg font-bold text-white">{{ $profil->nama_lengkap }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">NIM</p>
                            <p class="mt-3 text-lg font-bold text-white">{{ $profil->nim }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Asal Prodi</p>
                            <p class="mt-3 text-lg font-bold text-white">{{ $profil->asal_prodi }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Hobi</p>
                            <p class="mt-3 text-lg font-bold text-white">{{ $profil->hobi }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Skill</p>
                            <p class="mt-3 text-lg font-bold text-white">{{ $profil->skill }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-cyan-400/15 to-indigo-500/15 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Status</p>
                            <p class="mt-3 text-lg font-bold text-white">Aktif dan siap berkarya</p>
                        </div>
                    </div>

                    <div class="mt-10 flex items-center justify-between gap-4 flex-wrap">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Pengalaman Kegiatan</p>
                            <h2 class="mt-2 text-2xl font-black text-white sm:text-3xl">4 momen paling berkesan selama kuliah</h2>
                        </div>
                        <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300">
                            Klik detail untuk membaca pengalaman lengkap
                        </div>
                    </div>

                    <div class="mt-6 grid gap-5 md:grid-cols-2">
                        @foreach($kegiatan as $item)
                            <article class="group relative overflow-hidden rounded-[1.75rem] border border-white/10 bg-slate-900/70 p-6 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:shadow-2xl hover:shadow-cyan-950/20">
                                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-300/70 to-transparent"></div>
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Kegiatan</p>
                                        <h3 class="mt-3 text-xl font-bold leading-tight text-white">{{ $item->kegiatan_judul }}</h3>
                                    </div>
                                    <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-xs font-semibold text-cyan-100">{{ $item->kegiatan_waktu }}</span>
                                </div>

                                <p class="mt-4 text-sm leading-7 text-slate-300">{{ $item->kegiatan_deskripsi }}</p>

                                <div class="mt-6 flex items-center justify-between gap-4">
                                    <p class="text-sm text-slate-400">Kesan: <span class="text-slate-200">{{ $item->kegiatan_kesan }}</span></p>
                                    <a href="{{ route('detail.pengalaman', $item->id) }}" class="inline-flex items-center gap-2 rounded-full bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition duration-300 group-hover:bg-cyan-300">
                                        Lihat Detail
                                        <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const fotoProfilInput = document.getElementById('foto_profil');
        const fotoProfilPreview = document.getElementById('fotoProfilPreview');
        const fotoProfilName = document.getElementById('fotoProfilName');

        if (fotoProfilInput && fotoProfilPreview && fotoProfilName) {
            fotoProfilInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    fotoProfilName.textContent = 'Belum ada file baru dipilih.';
                    return;
                }

                fotoProfilName.textContent = file.name;
                fotoProfilPreview.src = URL.createObjectURL(file);
                this.form.submit();
            });
        }
    </script>
</body>
</html>