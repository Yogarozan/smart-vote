
@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-heading', 'Dashboard Overview')

@section('content')

<div class="mx-auto max-w-7xl space-y-8">

    {{-- WELCOME SECTION --}}
    <section class="relative overflow-hidden rounded-3xl border border-blue-400/20 bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-950 p-6 shadow-2xl shadow-blue-950/20 sm:p-8">

        <div class="absolute -right-16 -top-24 h-72 w-72 rounded-full bg-blue-300/10 blur-3xl"></div>
        <div class="absolute -bottom-24 right-1/3 h-56 w-56 rounded-full bg-indigo-300/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col justify-between gap-7 lg:flex-row lg:items-center">

            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[11px] font-bold tracking-wider text-blue-100">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    ADMINISTRATOR WORKSPACE
                </span>

                <h1 class="mt-5 text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl">
                    Selamat Datang,
                    <span class="text-blue-200">
                        {{ auth()->user()->name }}!
                    </span>
                </h1>

                <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100/80 sm:text-base">
                    Kelola seluruh aktivitas SMART VOTE melalui satu panel.
                    Pantau data pemilih, kandidat, dan hasil pemungutan suara
                    dengan lebih mudah dan terorganisir.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('admin.elections.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-800 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50">
                        Kelola Pemilihan
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ route('admin.results') }}"
                       class="inline-flex items-center gap-2 rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/20">
                        Lihat Hasil Voting
                    </a>
                </div>
            </div>

            <div class="hidden shrink-0 items-center justify-center lg:flex">
                <div class="flex h-44 w-44 items-center justify-center rounded-full border border-white/20 bg-white/10 shadow-2xl backdrop-blur-sm">
                    <div class="flex h-28 w-28 rotate-3 items-center justify-center rounded-3xl bg-white text-blue-700 shadow-xl">
                        <svg class="h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M8 5h8a2 2 0 012 2v13H6V7a2 2 0 012-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M9 5V3h6v2m-6 6h6m-6 4h6m-6 3h3"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M15 15l2 2 4-5"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- SECTION TITLE --}}
    <section>
        <div class="mb-5 flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-400">
                    System Overview
                </p>
                <h2 class="mt-2 text-2xl font-extrabold text-white">
                    Ringkasan Sistem
                </h2>
                <p class="mt-1 text-sm text-slate-400">
                    Informasi keseluruhan data yang tercatat di SMART VOTE.
                </p>
            </div>

            <div class="w-fit rounded-xl border border-slate-800 bg-slate-900 px-4 py-2 text-xs text-slate-400">
                <span class="mr-2 inline-block h-2 w-2 rounded-full bg-emerald-400"></span>
                Data sistem terkini
            </div>
        </div>

        {{-- STATISTICS CARDS --}}
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">

            {{-- TOTAL VOTERS --}}
            <div class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition duration-300 hover:-translate-y-1 hover:border-blue-500/50 hover:shadow-xl hover:shadow-blue-950/20">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-400">
                            Total Pemilih
                        </p>
                        <h3 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                            {{ number_format($totalVoters, 0, ',', '.') }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-500">
                            Akun pemilih terdaftar
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/15 text-blue-400 transition group-hover:bg-blue-500/25">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm8-1a3 3 0 010 6m4 5v-2a4 4 0 00-3-3.87"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 border-t border-slate-800 pt-4">
                    <a href="{{ route('admin.voters.index') }}"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-blue-400 transition hover:text-blue-300">
                        Lihat data pemilih
                        <span>→</span>
                    </a>
                </div>
            </div>

            {{-- TOTAL CANDIDATES --}}
            <div class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition duration-300 hover:-translate-y-1 hover:border-violet-500/50 hover:shadow-xl hover:shadow-violet-950/20">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-400">
                            Total Kandidat
                        </p>
                        <h3 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                            {{ number_format($totalCandidates, 0, ',', '.') }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-500">
                            Kandidat terdaftar dalam sistem
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/15 text-violet-400 transition group-hover:bg-violet-500/25">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="9" cy="8" r="3" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M3 20v-1a6 6 0 0112 0v1m1-13a3 3 0 010 6m2 2a5 5 0 013 5v1"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 border-t border-slate-800 pt-4">
                    <a href="{{ route('admin.candidates.index') }}"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-violet-400 transition hover:text-violet-300">
                        Kelola kandidat
                        <span>→</span>
                    </a>
                </div>
            </div>

            {{-- TOTAL VOTES --}}
            <div class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition duration-300 hover:-translate-y-1 hover:border-emerald-500/50 hover:shadow-xl hover:shadow-emerald-950/20 sm:col-span-2 xl:col-span-1">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-400">
                            Total Suara
                        </p>
                        <h3 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                            {{ number_format($totalVotes, 0, ',', '.') }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-500">
                            Suara yang tercatat dalam sistem
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/15 text-emerald-400 transition group-hover:bg-emerald-500/25">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M9 12l2 2 4-4m5-3v5a9 9 0 11-18 0V7l9-4 9 4z"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 border-t border-slate-800 pt-4">
                    <a href="{{ route('admin.results') }}"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-400 transition hover:text-emerald-300">
                        Lihat hasil voting
                        <span>→</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- QUICK ACCESS --}}
    <section>
        <div class="mb-5">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-400">
                Quick Access
            </p>
            <h2 class="mt-2 text-2xl font-extrabold text-white">
                Akses Pengelolaan
            </h2>
            <p class="mt-1 text-sm text-slate-400">
                Akses cepat ke fitur utama administrator.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

            <a href="{{ route('admin.elections.index') }}"
               class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition hover:-translate-y-1 hover:border-blue-500/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/15 text-blue-400 transition group-hover:bg-blue-500/25">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="4" width="16" height="17" rx="2" stroke-width="1.8"/>
                        <path stroke-linecap="round" stroke-width="1.8" d="M8 2v4m8-4v4M4 9h16m-11 4h6"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-white">Kelola Pemilihan</h3>
                <p class="mt-2 text-xs leading-6 text-slate-400">
                    Atur jadwal, informasi, dan pelaksanaan pemilihan.
                </p>
                <p class="mt-4 text-xs font-bold text-blue-400 group-hover:text-blue-300">
                    Buka menu →
                </p>
            </a>

            <a href="{{ route('admin.candidates.index') }}"
               class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition hover:-translate-y-1 hover:border-violet-500/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/15 text-violet-400 transition group-hover:bg-violet-500/25">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="9" cy="8" r="3" stroke-width="1.8"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M3 20v-1a6 6 0 0112 0v1m1-13a3 3 0 010 6"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-white">Kelola Kandidat</h3>
                <p class="mt-2 text-xs leading-6 text-slate-400">
                    Atur data, foto, visi, misi, dan nomor urut kandidat.
                </p>
                <p class="mt-4 text-xs font-bold text-violet-400 group-hover:text-violet-300">
                    Buka menu →
                </p>
            </a>

            <a href="{{ route('admin.voters.index') }}"
               class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition hover:-translate-y-1 hover:border-cyan-500/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/15 text-cyan-400 transition group-hover:bg-cyan-500/25">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-white">Data Pemilih</h3>
                <p class="mt-2 text-xs leading-6 text-slate-400">
                    Periksa dan kelola data akun pemilih terdaftar.
                </p>
                <p class="mt-4 text-xs font-bold text-cyan-400 group-hover:text-cyan-300">
                    Buka menu →
                </p>
            </a>

            <a href="{{ route('admin.results') }}"
               class="group rounded-2xl border border-slate-800 bg-slate-900 p-5 transition hover:-translate-y-1 hover:border-emerald-500/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/15 text-emerald-400 transition group-hover:bg-emerald-500/25">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M4 19V5m0 14h17M8 16v-5m5 5V7m5 9v-8"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-white">Hasil & Laporan</h3>
                <p class="mt-2 text-xs leading-6 text-slate-400">
                    Pantau rekap dan perolehan suara pemilihan.
                </p>
                <p class="mt-4 text-xs font-bold text-emerald-400 group-hover:text-emerald-300">
                    Buka menu →
                </p>
            </a>

        </div>
    </section>

    {{-- ADMIN REMINDER --}}
    <section class="rounded-2xl border border-amber-500/20 bg-amber-500/5 p-5 sm:p-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-500/10 text-amber-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M12 9v4m0 4h.01M10.3 3.9L2.5 17.4A2 2 0 004.2 20h15.6a2 2 0 001.7-2.6L13.7 3.9a2 2 0 00-3.4 0z"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-amber-300">
                    Perhatikan Pengelolaan Pemilihan
                </h3>
                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Pastikan data kandidat dan pemilih sudah benar sebelum
                    pemilihan dimulai. Periksa kembali jadwal pemilihan dan
                    konfigurasi sistem untuk menghindari kesalahan saat
                    proses pemungutan suara berlangsung.
                </p>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <div class="pb-3 text-center text-xs text-slate-600">
        SMART VOTE · Sistem Pemilihan Elektronik
    </div>

</div>

@endsection
