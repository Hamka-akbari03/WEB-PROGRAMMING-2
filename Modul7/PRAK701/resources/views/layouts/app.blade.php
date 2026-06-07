<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Perpustakaan PRAK701')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1d4ed8',
                        },
                    },
                    boxShadow: {
                        soft: '0 10px 30px rgba(15, 23, 42, 0.08)',
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    @include('partials.navbar')

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>