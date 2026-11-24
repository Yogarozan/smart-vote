
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SMART VOTE | Demokrasi Digital')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/smartvote-icon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white antialiased">

    {{-- NAVBAR --}}
    <header class="fixed top-0 left-0 right-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4 flex items-center justify-between gap-3">

    {{-- LOGO SMART VOTE --}}
    <a href="{{ route('home') }}"
        class="flex items-center gap-2 sm:gap-3 shrink-0 group">

    {{-- KOTAK LOGO PUTIH --}}
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-white
                border border-white/80 shadow-lg shadow-blue-500/10
                flex items-center justify-center p-1.5
                transition duration-300 group-hover:scale-105">

        <img src="{{ asset('images/smartvote-icon.svg') }}"
             alt="Logo SMART VOTE"
             class="w-full h-full object-contain">
        </div>

    {{-- IDENTITAS WEBSITE --}}
    <div class="leading-tight">
        <p class="font-extrabold tracking-wide text-sm sm:text-base
                  text-white group-hover:text-blue-300 transition">
            SMART VOTE
        </p>

        <p class="text-[8px] sm:text-[10px] text-slate-400
                  tracking-wider mt-1">
            DIGITAL ELECTION PLATFORM
        </p>
    </div>

</a>

            {{-- MENU DESKTOP --}}
            <div class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-medium text-slate-300">
                <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
                <a href="{{ route('tentang') }}" class="hover:text-blue-400 transition">Tentang</a>
                <a href="{{ route('keunggulan') }}" class="hover:text-blue-400 transition">Keunggulan</a>
                <a href="{{ route('panduan') }}" class="hover:text-blue-400 transition">Panduan</a>
            </div>

            {{-- TOMBOL DESKTOP --}}
            <div class="hidden sm:flex items-center gap-2">
                <a href="{{ route('login') }}"
                   class="px-4 py-2 rounded-lg border border-white/15 hover:bg-white/10 transition text-sm font-semibold">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 transition text-sm font-bold shadow-lg shadow-blue-600/20">
                    Daftar
                </a>
            </div>

            {{-- TOMBOL HAMBURGER MOBILE --}}
            <details class="relative md:hidden">
                <summary class="list-none cursor-pointer w-10 h-10 rounded-lg border border-white/15 flex items-center justify-center hover:bg-white/10 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </summary>

                <div class="absolute right-0 top-14 w-64 max-w-[calc(100vw-2rem)] rounded-2xl border border-white/10 bg-slate-900 shadow-2xl p-4">
                    <div class="flex flex-col gap-1 text-sm font-medium text-slate-200">
                        <a href="{{ route('home') }}" class="px-4 py-3 rounded-lg hover:bg-white/10 transition">Beranda</a>
                        <a href="{{ route('tentang') }}" class="px-4 py-3 rounded-lg hover:bg-white/10 transition">Tentang</a>
                        <a href="{{ route('keunggulan') }}" class="px-4 py-3 rounded-lg hover:bg-white/10 transition">Keunggulan</a>
                        <a href="{{ route('panduan') }}" class="px-4 py-3 rounded-lg hover:bg-white/10 transition">Panduan</a>
                    </div>

                    <div class="border-t border-white/10 mt-3 pt-3 flex flex-col gap-2">
                        <a href="{{ route('login') }}"
                           class="text-center px-4 py-3 rounded-lg border border-white/15 hover:bg-white/10 transition font-semibold">
                            Masuk
                        </a>

                        <a href="{{ route('register') }}"
                           class="text-center px-4 py-3 rounded-lg bg-blue-600 hover:bg-blue-500 transition font-bold">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </details>

        </nav>
    </header>

    {{-- PAGE CONTENT --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-white/10 bg-slate-950 py-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row justify-between gap-8">

            <div>
{{-- FOOTER LOGO SMART VOTE --}}
        <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-xl bg-white
                border border-white/80 shadow-lg
                flex items-center justify-center p-1.5">

        <img src="{{ asset('images/smartvote-icon.svg') }}"
             alt="Logo SMART VOTE"
             class="w-full h-full object-contain">
        </div>

        <div>
        <p class="font-extrabold tracking-wide text-white">
            SMART VOTE
        </p>
        <p class="text-[9px] text-slate-400 tracking-wider mt-1">
            DIGITAL ELECTION PLATFORM
        </p>
    </div>

</div>


                    <p class="text-sm text-slate-400 mt-4 max-w-md leading-relaxed">
                        Sistem Pemungutan Suara Digital Berbasis Teknologi
                        untuk Mendukung Demokrasi.
                    </p>
                </div>

                <div class="flex flex-wrap gap-6 text-sm text-slate-400">
                    <a href="{{ route('home') }}" class="hover:text-blue-400">Beranda</a>
                    <a href="{{ route('tentang') }}" class="hover:text-blue-400">Tentang</a>
                    <a href="{{ route('keunggulan') }}" class="hover:text-blue-400">Keunggulan</a>
                    <a href="{{ route('panduan') }}" class="hover:text-blue-400">Panduan</a>
                </div>

            </div>

            <div class="border-t border-white/10 mt-8 pt-6 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} SMART VOTE. Seluruh hak cipta dilindungi.
            </div>

        </div>
    </footer>

</body>
</html>
