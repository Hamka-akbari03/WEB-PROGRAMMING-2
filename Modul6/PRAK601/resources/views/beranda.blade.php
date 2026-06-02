<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Profil Praktikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    boxShadow: {
                        glow: '0 20px 60px -20px rgba(14, 165, 233, 0.45)',
                    },
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute left-1/2 top-0 h-80 w-80 -translate-x-1/2 rounded-full bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute right-0 top-24 h-96 w-96 rounded-full bg-indigo-500/15 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-emerald-500/10 blur-3xl"></div>
    </div>

    <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/75 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('beranda') }}" class="group flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-cyan-400/15 ring-1 ring-inset ring-cyan-300/30 transition duration-300 group-hover:scale-105 group-hover:bg-cyan-400/20">
                    <span class="h-3 w-3 rounded-full bg-cyan-300 shadow-glow"></span>
                </span>
                <div>
                    <p class="text-sm font-semibold tracking-[0.3em] text-cyan-200 uppercase">Praktikan</p>
                    <p class="text-sm text-slate-400">Portfolio MVC Laravel 12</p>
                </div>
            </a>

            <div class="flex items-center gap-2 rounded-full border border-white/10 bg-white/5 p-1 shadow-lg shadow-cyan-950/20">
                <a href="{{ route('beranda') }}" class="rounded-full bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">Beranda</a>
                <a href="{{ route('profil') }}" class="rounded-full px-4 py-2 text-sm font-medium text-slate-200 transition hover:bg-white/10 hover:text-white">Profil</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <section class="grid items-center gap-10 lg:grid-cols-12">
            <div class="lg:col-span-7">
                <div class="inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-2 text-sm text-cyan-100">
                    <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                    Halaman Beranda Praktikan
                </div>

                <h1 class="mt-6 max-w-3xl text-4xl font-black leading-tight text-white sm:text-5xl lg:text-7xl">
                    Modern, bersih, dan profesional untuk menampilkan identitas praktikan.
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                    Selamat datang pada halaman beranda yang menampilkan data utama praktikan secara ringkas namun tetap elegan, cocok untuk tampilan laporan berbasis Laravel Blade dan Tailwind CSS.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/40 backdrop-blur">
                        <p class="text-sm font-medium text-cyan-200">Nama Lengkap</p>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $profil->nama_lengkap }}</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/40 backdrop-blur">
                        <p class="text-sm font-medium text-cyan-200">NIM</p>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $profil->nim }}</p>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('profil') }}" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition duration-300 hover:-translate-y-0.5 hover:bg-cyan-200">
                        Lihat Profil Lengkap
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-glow backdrop-blur-xl">
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-300 to-transparent"></div>
                    <div class="rounded-[1.5rem] border border-white/10 bg-slate-900/70 p-6">
                        <p class="text-sm uppercase tracking-[0.35em] text-slate-400">Profile Snapshot</p>
                        <div class="mt-6 space-y-4">
                            <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                                <span class="text-sm text-slate-400">Nama</span>
                                <span class="text-sm font-semibold text-white">{{ $profil->nama_lengkap }}</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                                <span class="text-sm text-slate-400">NIM</span>
                                <span class="text-sm font-semibold text-white">{{ $profil->nim }}</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                                <span class="text-sm text-slate-400">Asal Prodi</span>
                                <span class="text-sm font-semibold text-white">{{ $profil->asal_prodi }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>