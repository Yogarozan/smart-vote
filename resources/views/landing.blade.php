
@extends('layouts.landing')

@section('title', 'Beranda SMART VOTE')

@section('content')

{{-- HERO / BERANDA --}}
<section id="beranda" class="relative overflow-hidden pt-20 pb-24">

    <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 -left-32 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

        <div>
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-300 text-xs font-semibold mb-7">
                <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                PLATFORM DEMOKRASI DIGITAL
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                Suara Anda,
                <span class="text-blue-400">Masa Depan</span>
                Kita.
            </h1>

            <p class="mt-7 text-slate-400 text-base md:text-lg leading-relaxed max-w-xl">
                SMART VOTE merupakan sistem pemungutan suara digital
                yang dirancang untuk mendukung proses demokrasi
                yang mudah, terarah, dan transparan.
            </p>

            <div class="mt-9 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('register') }}"
                   class="px-7 py-4 rounded-xl bg-blue-600 hover:bg-blue-500 text-center font-bold transition">
                    Mulai Sekarang →
                </a>

                <a href="{{ route('panduan') }}"
                   class="px-7 py-4 rounded-xl border border-slate-700 hover:bg-slate-800 text-center font-semibold transition">
                    Pelajari Panduan
                </a>
            </div>

            <div class="mt-10 flex flex-wrap gap-x-7 gap-y-3 text-sm text-slate-400">
                <span>✓ Mudah digunakan</span>
                <span>✓ Akses digital</span>
                <span>✓ Proses terarah</span>
            </div>
        </div>

        {{-- ILUSTRASI DASHBOARD --}}
        <div class="relative">
            <div class="absolute inset-0 bg-blue-500/20 blur-3xl rounded-full"></div>

            <div class="relative rounded-3xl border border-slate-700 bg-slate-900 p-5 md:p-7 shadow-2xl">

                <div class="flex items-center justify-between border-b border-slate-800 pb-5">
                    <div>
                        <p class="text-xs text-slate-400">SMART VOTE</p>
                        <h2 class="font-bold text-lg mt-1">Digital Election</h2>
                    </div>

                    <div class="px-3 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 text-xs">
                        System Online
                    </div>
                </div>

                <div class="mt-7 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 p-6">
                    <p class="text-blue-100 text-sm">Selamat Datang</p>
                    <h2 class="text-2xl font-bold mt-2">
                        Saatnya Suara Anda Berarti.
                    </h2>
                    <p class="text-blue-100 text-sm mt-3">
                        Gunakan hak pilih Anda dengan bijak.
                    </p>

                    <div class="mt-7 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-blue-100">Pemungutan Suara</p>
                            <p class="font-bold mt-1">Digital Voting</p>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-white/15 flex items-center justify-center text-3xl">
                            ✓
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-5">
                    <div class="rounded-xl bg-slate-800 p-4">
                        <div class="text-blue-400 text-xl">♧</div>
                        <p class="text-slate-400 text-xs mt-3">Partisipasi</p>
                        <p class="font-bold mt-1">Pemilih</p>
                    </div>

                    <div class="rounded-xl bg-slate-800 p-4">
                        <div class="text-indigo-400 text-xl">◈</div>
                        <p class="text-slate-400 text-xs mt-3">Pengelolaan</p>
                        <p class="font-bold mt-1">Pemilihan</p>
                    </div>
                </div>

                <div class="mt-5 rounded-xl border border-slate-800 p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center">
                            ✓
                        </div>
                        <div>
                            <p class="font-semibold text-sm">Satu Pemilih, Satu Suara</p>
                            <p class="text-xs text-slate-400 mt-1">
                                Mendukung proses pemilihan yang tertib.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- INFORMASI SINGKAT --}}
<section class="border-t border-slate-800 bg-slate-900/50 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-blue-400 text-sm font-bold tracking-widest uppercase">
            SMART VOTE
        </p>

        <h2 class="text-3xl md:text-4xl font-bold mt-4">
            Teknologi untuk Partisipasi Demokrasi
        </h2>

        <p class="text-slate-400 max-w-2xl mx-auto mt-5 leading-relaxed">
            Kenali sistem, fitur, dan panduan penggunaan SMART VOTE
            melalui halaman informasi yang telah kami sediakan.
        </p>

        <div class="grid md:grid-cols-3 gap-5 mt-12 text-left">

            <a href="{{ route('tentang') }}"
               class="rounded-2xl border border-slate-800 bg-slate-950 p-7 hover:border-blue-500 transition">
                <span class="text-blue-400 text-sm font-bold">01 / PROFIL</span>
                <h3 class="font-bold text-xl mt-4">Tentang SMART VOTE</h3>
                <p class="text-sm text-slate-400 mt-3">
                    Kenali tujuan dan latar belakang pengembangan sistem.
                </p>
                <p class="text-blue-400 mt-5 text-sm font-semibold">Selengkapnya →</p>
            </a>

            <a href="{{ route('keunggulan') }}"
               class="rounded-2xl border border-slate-800 bg-slate-950 p-7 hover:border-blue-500 transition">
                <span class="text-blue-400 text-sm font-bold">02 / FITUR</span>
                <h3 class="font-bold text-xl mt-4">Keunggulan Sistem</h3>
                <p class="text-sm text-slate-400 mt-3">
                    Pelajari fitur dan fasilitas yang tersedia.
                </p>
                <p class="text-blue-400 mt-5 text-sm font-semibold">Selengkapnya →</p>
            </a>

            <a href="{{ route('panduan') }}"
               class="rounded-2xl border border-slate-800 bg-slate-950 p-7 hover:border-blue-500 transition">
                <span class="text-blue-400 text-sm font-bold">03 / PANDUAN</span>
                <h3 class="font-bold text-xl mt-4">Panduan Penggunaan</h3>
                <p class="text-sm text-slate-400 mt-3">
                    Ikuti langkah penggunaan sistem pemungutan suara.
                </p>
                <p class="text-blue-400 mt-5 text-sm font-semibold">Selengkapnya →</p>
            </a>

        </div>
    </div>
</section>

@endsection
