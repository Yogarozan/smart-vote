
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SMART VOTE') | SMART VOTE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#080f1f] text-white antialiased">

@auth

@if(auth()->user()->role === 'admin')

<div class="min-h-screen bg-[#080f1f]">

    {{-- SIDEBAR DESKTOP --}}
    <aside class="fixed inset-y-0 left-0 z-40 hidden w-72 flex-col border-r border-slate-800/80 bg-[#0b1427] lg:flex">

        {{-- BRAND --}}
        <div class="flex h-20 items-center gap-3 border-b border-slate-800/80 px-6">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg shadow-blue-950/40">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M8 5h8a2 2 0 012 2v13H6V7a2 2 0 012-2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M9 5V3h6v2m-6 6h6m-6 4h6m-6 3h3"/>
                </svg>
            </div>

            <div>
                <h1 class="text-xl font-extrabold tracking-wide">
                    SMART <span class="text-blue-400">VOTE</span>
                </h1>
                <p class="text-[10px] font-semibold tracking-[0.2em] text-slate-500">
                    ADMINISTRATION PANEL
                </p>
            </div>
        </div>

        {{-- ADMIN PROFILE --}}
        <div class="mx-4 mt-6 rounded-2xl border border-slate-800 bg-slate-900/70 p-4">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/15 text-lg font-bold text-blue-300">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-bold text-white">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="mt-1 text-xs text-blue-400">
                        Administrator
                    </p>
                </div>

                <span class="h-2.5 w-2.5 rounded-full bg-emerald-400 ring-4 ring-emerald-400/10"></span>
            </div>
        </div>

        {{-- NAVIGATION --}}
        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-7">

            <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
                Menu Utama
            </p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                </svg>
                Dashboard
                @if(request()->routeIs('admin.dashboard'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-white"></span>
                @endif
            </a>

            <p class="mb-3 mt-8 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
                Manajemen Pemilihan
            </p>

            <a href="{{ route('admin.elections.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.elections.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="4" y="4" width="16" height="17" rx="2" stroke-width="1.8"/>
                    <path stroke-linecap="round" stroke-width="1.8" d="M8 2v4m8-4v4M4 9h16m-11 4h6m-6 4h4"/>
                </svg>
                Kelola Pemilihan
            </a>

            <a href="{{ route('admin.candidates.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.candidates.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="9" cy="8" r="3" stroke-width="1.8"/>
                    <path stroke-linecap="round" stroke-width="1.8" d="M3 20v-1a6 6 0 0112 0v1M16 5a3 3 0 010 6m2 3a5 5 0 013 5v1"/>
                </svg>
                Data Kandidat
            </a>

            <a href="{{ route('admin.voters.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.voters.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm8-1a3 3 0 010 6m4 5v-2a4 4 0 00-3-3.87"/>
                </svg>
                Data Pemilih
            </a>

            <a href="{{ route('admin.results') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.results') ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M4 19V5m0 14h17M8 16v-5m5 5V7m5 9v-8"/>
                </svg>
                Hasil & Laporan
            </a>

        </nav>

        {{-- SIDEBAR FOOTER --}}
        <div class="border-t border-slate-800/80 p-4">
            <div class="mb-4 rounded-xl bg-blue-500/5 p-3">
                <div class="flex items-center gap-2 text-xs font-semibold text-blue-300">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Sistem SMART VOTE
                </div>
                <p class="mt-2 text-[11px] leading-5 text-slate-500">
                    Panel pengelolaan pemilihan elektronik.
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-red-400 transition hover:bg-red-500/10">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M10 17l5-5-5-5m5 5H3m10-9h5a2 2 0 012 2v14a2 2 0 01-2 2h-5"/>
                    </svg>
                    Keluar dari Sistem
                </button>
            </form>
        </div>
    </aside>

    {{-- AREA KONTEN ADMIN --}}
    <div class="min-h-screen lg:pl-72">

        {{-- TOPBAR --}}
        <header class="sticky top-0 z-30 border-b border-slate-800/80 bg-[#080f1f]/90 backdrop-blur-xl">
            <div class="flex min-h-20 items-center justify-between gap-4 px-4 sm:px-7 lg:px-9">

                <div>
                    <p class="text-xs font-medium text-slate-500">
                        SMART VOTE / ADMIN
                    </p>
                    <h2 class="mt-1 text-sm font-bold text-white sm:text-base">
                        @yield('page-heading', 'Administrator Panel')
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-white">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            Administrator
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-blue-400/20 bg-blue-500/15 font-bold text-blue-300">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>

            </div>

            {{-- MOBILE NAVIGATION --}}
            <div class="border-t border-slate-800/70 px-4 py-3 lg:hidden">
                <nav class="flex gap-2 overflow-x-auto pb-1">

                    <a href="{{ route('admin.dashboard') }}"
                       class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold
                       {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'bg-slate-900 text-slate-400' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.elections.index') }}"
                       class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold
                       {{ request()->routeIs('admin.elections.*') ? 'bg-blue-600 text-white' : 'bg-slate-900 text-slate-400' }}">
                        Pemilihan
                    </a>

                    <a href="{{ route('admin.candidates.index') }}"
                       class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold
                       {{ request()->routeIs('admin.candidates.*') ? 'bg-blue-600 text-white' : 'bg-slate-900 text-slate-400' }}">
                        Kandidat
                    </a>

                    <a href="{{ route('admin.voters.index') }}"
                       class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold
                       {{ request()->routeIs('admin.voters.*') ? 'bg-blue-600 text-white' : 'bg-slate-900 text-slate-400' }}">
                        Pemilih
                    </a>

                    <a href="{{ route('admin.results') }}"
                       class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold
                       {{ request()->routeIs('admin.results') ? 'bg-blue-600 text-white' : 'bg-slate-900 text-slate-400' }}">
                        Hasil
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                        @csrf
                        <button type="submit" class="rounded-lg bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-300">
                            Logout
                        </button>
                    </form>

                </nav>
            </div>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="px-4 py-7 sm:px-7 sm:py-8 lg:px-9">
            @yield('content')
        </main>

        <footer class="border-t border-slate-800/70 px-4 py-5 text-center text-xs text-slate-600 sm:px-7 lg:px-9">
            © {{ date('Y') }} SMART VOTE. Sistem Pemilihan Elektronik.
        </footer>

    </div>
</div>

@else

{{-- LAYOUT USER: TETAP TERPISAH DARI ADMIN --}}
<div class="flex min-h-screen">

    <aside class="hidden w-64 shrink-0 border-r border-slate-800 bg-slate-900 p-6 md:block">
        <h1 class="mb-10 text-2xl font-extrabold text-blue-400">
            SMART VOTE
        </h1>

        <nav class="space-y-3">
            <a href="{{ route('voter.dashboard') }}"
               class="block rounded-xl p-3 text-sm font-medium transition
               {{ request()->routeIs('voter.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Dashboard
            </a>

            <a href="{{ route('voter.profile') }}"
               class="block rounded-xl p-3 text-sm font-medium transition
               {{ request()->routeIs('voter.profile*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Profil Saya
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-10">
            @csrf
            <button type="submit" class="w-full rounded-xl bg-red-600/20 p-3 text-sm font-semibold text-red-300 transition hover:bg-red-600/30">
                Logout
            </button>
        </form>
    </aside>

    <main class="min-w-0 flex-1 p-4 sm:p-6 md:p-10">
        <header class="mb-8 flex items-center justify-between gap-3">
            <div>
                <p class="text-sm text-slate-400">
                    Selamat datang,
                </p>
                <p class="font-bold text-white">
                    {{ auth()->user()->name }}
                </p>
            </div>

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/15 font-bold text-blue-300">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </header>

        {{-- NAV USER MOBILE --}}
        <div class="mb-6 flex gap-2 md:hidden">
            <a href="{{ route('voter.dashboard') }}"
               class="rounded-lg px-4 py-2 text-xs font-semibold {{ request()->routeIs('voter.dashboard') ? 'bg-blue-600 text-white' : 'bg-slate-800 text-slate-300' }}">
                Dashboard
            </a>
            <a href="{{ route('voter.profile') }}"
               class="rounded-lg px-4 py-2 text-xs font-semibold {{ request()->routeIs('voter.profile*') ? 'bg-blue-600 text-white' : 'bg-slate-800 text-slate-300' }}">
                Profil Saya
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-red-600/20 px-4 py-2 text-xs font-semibold text-red-300">
                    Logout
                </button>
            </form>
        </div>

        @yield('content')
    </main>
</div>

@endif

@endauth

</body>
</html>
