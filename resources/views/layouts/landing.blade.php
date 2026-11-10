<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMART VOTE')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white antialiased">

    <header class="fixed top-0 left-0 right-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center font-bold text-xl">
                    S
                </div>
                <div>
                    <h1 class="font-bold text-xl">SMART VOTE</h1>
                    <p class="text-xs text-slate-400">Digital Voting Platform</p>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-7 text-sm">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'text-blue-400' : 'text-slate-300' }} hover:text-blue-400">
                    Beranda
                </a>

                <a href="{{ route('tentang') }}"
                   class="{{ request()->routeIs('tentang') ? 'text-blue-400' : 'text-slate-300' }} hover:text-blue-400">
                    Tentang
                </a>

                <a href="{{ route('keunggulan') }}"
                   class="{{ request()->routeIs('keunggulan') ? 'text-blue-400' : 'text-slate-300' }} hover:text-blue-400">
                    Keunggulan
                </a>

                <a href="{{ route('panduan') }}"
                   class="{{ request()->routeIs('panduan') ? 'text-blue-400' : 'text-slate-300' }} hover:text-blue-400">
                    Panduan
                </a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                   class="hidden sm:block px-5 py-2.5 rounded-xl border border-slate-700 hover:bg-slate-800 text-sm">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-sm font-semibold">
                    Daftar
                </a>
            </div>

        </nav>
    </header>

    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="border-t border-slate-800 bg-slate-950 py-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between gap-6">
            <div>
                <h2 class="font-bold text-xl">SMART VOTE</h2>
                <p class="text-sm text-slate-500 mt-2 max-w-md">
                    Sistem Pemungutan Suara Digital Berbasis Teknologi
                    untuk Mendukung Demokrasi.
                </p>
            </div>

            <div class="flex flex-wrap gap-5 text-sm text-slate-400">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('tentang') }}">Tentang</a>
                <a href="{{ route('keunggulan') }}">Keunggulan</a>
                <a href="{{ route('panduan') }}">Panduan</a>
            </div>
        </div>

        <p class="text-center text-xs text-slate-600 mt-8">
            © {{ date('Y') }} SMART VOTE. All Rights Reserved.
        </p>
    </footer>

</body>
</html>
