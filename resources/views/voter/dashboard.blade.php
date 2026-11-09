
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 text-white px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl space-y-8">

        {{-- HEADER --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-blue-400">
                    SMART VOTE / USER DASHBOARD
                </p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Selamat Datang,
                    <span class="text-blue-400">
                        {{ Auth::user()->name ?? 'Pemilih' }}
                    </span>
                </h1>
                <p class="mt-2 max-w-2xl text-sm leading-relaxed text-slate-400 sm:text-base">
                    Gunakan hak suara Anda dengan bijak. Satu suara Anda
                    merupakan bagian penting dalam menentukan masa depan.
                </p>
            </div>

            <div class="flex items-center gap-3 rounded-2xl border border-slate-800 bg-slate-900/80 px-4 py-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/15 text-blue-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-400">Tanggal hari ini</p>
                    <p class="font-semibold">
                        {{ now()->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- HERO BANNER --}}
        <div class="relative overflow-hidden rounded-3xl border border-blue-400/20 bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-950 p-6 shadow-2xl shadow-blue-950/30 sm:p-9">
            <div class="absolute -right-12 -top-20 h-72 w-72 rounded-full bg-blue-400/10 blur-2xl"></div>
            <div class="absolute -bottom-24 right-1/4 h-64 w-64 rounded-full bg-indigo-300/10 blur-2xl"></div>

            <div class="relative z-10 grid items-center gap-8 lg:grid-cols-[1.4fr_0.6fr]">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold text-blue-100">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        PLATFORM E-VOTING DIGITAL
                    </span>

                    <h2 class="mt-5 max-w-2xl text-3xl font-extrabold leading-tight sm:text-4xl">
                        Suara Anda,
                        <span class="text-blue-200">Pilihan Masa Depan.</span>
                    </h2>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100/80 sm:text-base">
                        SMART VOTE membantu Anda mengikuti proses pemilihan
                        secara digital dengan mudah, praktis, dan transparan.
                        Kenali kandidat sebelum menentukan pilihan.
                    </p>

                    <a href="#pemilihan"
                       class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-blue-800 shadow-lg transition hover:-translate-y-1 hover:bg-blue-50">
                        Lihat Pemilihan
                        <svg class="h-5 w-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <div class="hidden justify-center lg:flex">
                    <div class="flex h-48 w-48 items-center justify-center rounded-full border border-white/20 bg-white/10 shadow-2xl backdrop-blur-sm">
                        <div class="flex h-32 w-32 items-center justify-center rounded-3xl bg-white text-blue-700 shadow-xl rotate-3">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
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
        </div>

        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5 transition hover:border-blue-500/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-400">Pemilihan Aktif</p>
                        <h3 class="mt-2 text-3xl font-extrabold">
                            {{ $elections->count() }}
                        </h3>
                        <p class="mt-1 text-xs text-slate-500">
                            Pemilihan yang dapat Anda ikuti
                        </p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M9 12l2 2 4-4m5-3v5a9 9 0 11-18 0V7l9-4 9 4z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-400">Status Akun</p>
                        <h3 class="mt-2 text-2xl font-extrabold text-emerald-400">
                            Terdaftar
                        </h3>
                        <p class="mt-1 text-xs text-slate-500">
                            Akun pemilih SMART VOTE
                        </p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21a8 8 0 0116 0"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- DAFTAR PEMILIHAN --}}
        <section id="pemilihan" class="scroll-mt-6">
            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-blue-400">
                        Voting Center
                    </p>
                    <h2 class="mt-1 text-2xl font-bold sm:text-3xl">
                        Pemilihan Tersedia
                    </h2>
                    <p class="mt-2 text-sm text-slate-400">
                        Pilih pemilihan yang sedang berlangsung dan tentukan pilihan Anda.
                    </p>
                </div>

                <span class="w-fit rounded-full border border-blue-500/20 bg-blue-500/10 px-4 py-2 text-xs font-semibold text-blue-300">
                    {{ $elections->count() }} Pemilihan Aktif
                </span>
            </div>

            @forelse($elections as $election)
                <div class="group mb-5 overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 transition duration-300 hover:-translate-y-1 hover:border-blue-500/50 hover:shadow-xl hover:shadow-blue-950/20">
                    <div class="h-1.5 bg-gradient-to-r from-blue-500 via-indigo-500 to-cyan-400"></div>

                    <div class="p-6 sm:p-7">
                        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex-1">
                                <div class="mb-3 flex flex-wrap items-center gap-2">
                                    <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-400">
                                        ● Sedang Berlangsung
                                    </span>
                                    <span class="rounded-full bg-slate-800 px-3 py-1 text-xs text-slate-400">
                                        SMART VOTE
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold transition group-hover:text-blue-400 sm:text-2xl">
                                    {{ $election->title }}
                                </h3>

                                <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-400">
                                    {{ $election->description ?: 'Tidak ada deskripsi untuk pemilihan ini.' }}
                                </p>

                                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:gap-8">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.8"
                                                      d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14H4V6a1 1 0 011-1z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500">Mulai</p>
                                            <p class="text-sm font-semibold">
                                                {{ \Carbon\Carbon::parse($election->start_at)->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-400">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.8"
                                                      d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500">Berakhir</p>
                                            <p class="text-sm font-semibold">
                                                {{ \Carbon\Carbon::parse($election->end_at)->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-3 lg:min-w-48">
                                <a href="{{ route('voter.vote', $election) }}"
                                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-950/30 transition hover:bg-blue-500">
                                    Lihat Kandidat
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                <p class="text-center text-xs text-slate-500">
                                    Kenali kandidat sebelum memilih
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-900/70 px-6 py-12 text-center sm:px-10">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-500/10 text-blue-400">
                        <svg class="h-10 w-10" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M8 5h8a2 2 0 012 2v13H6V7a2 2 0 012-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M9 10h6m-6 4h6m-6 4h3"/>
                        </svg>
                    </div>

                    <h3 class="mt-6 text-xl font-bold">
                        Belum Ada Pemilihan Aktif
                    </h3>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-400">
                        Saat ini belum ada pemilihan yang sedang berlangsung.
                        Silakan kunjungi dashboard ini kembali ketika pemilihan
                        telah dibuka oleh administrator.
                    </p>
                    <div class="mt-5 inline-flex items-center gap-2 rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-xs font-medium text-slate-300">
                        <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                        Menunggu jadwal pemilihan
                    </div>
                </div>
            @endforelse
        </section>

        {{-- PANDUAN MEMILIH --}}
        <section>
            <div class="mb-5">
                <p class="text-sm font-semibold uppercase tracking-wider text-blue-400">
                    Quick Guide
                </p>
                <h2 class="mt-1 text-2xl font-bold">
                    Cara Menggunakan SMART VOTE
                </h2>
                <p class="mt-2 text-sm text-slate-400">
                    Ikuti langkah sederhana berikut untuk menggunakan hak suara Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/15 text-lg font-extrabold text-blue-400">
                        01
                    </div>
                    <h3 class="mt-5 font-bold">Pilih Pemilihan</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Buka pemilihan yang sedang berlangsung melalui dashboard.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500/15 text-lg font-extrabold text-indigo-400">
                        02
                    </div>
                    <h3 class="mt-5 font-bold">Kenali Kandidat</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Pelajari profil, visi, dan misi setiap kandidat sebelum menentukan pilihan.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/15 text-lg font-extrabold text-emerald-400">
                        03
                    </div>
                    <h3 class="mt-5 font-bold">Kirim Suara</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Tentukan satu pilihan, periksa kembali, lalu kirim suara Anda.
                    </p>
                </div>
            </div>
        </section>

        {{-- FOOTER --}}
        <div class="border-t border-slate-800 pt-6 text-center">
            <p class="text-xs leading-6 text-slate-500">
                SMART VOTE — Sistem Pemilihan Elektronik
                <br>
                Gunakan hak suara Anda secara bijak dan bertanggung jawab.
            </p>
        </div>

    </div>
</div>

@endsection
