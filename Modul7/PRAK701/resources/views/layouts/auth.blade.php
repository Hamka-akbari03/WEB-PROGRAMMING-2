<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') | Sistem Informasi Perpustakaan PRAK701</title>
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
                        },
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(37,99,235,0.10),_transparent_42%),linear-gradient(180deg,_#f8fafc,_#eef2ff_60%,_#f8fafc)]">
        <main class="mx-auto flex min-h-screen max-w-7xl items-center justify-center px-4 py-10">
            @yield('content')
        </main>
    </div>
</body>
</html>