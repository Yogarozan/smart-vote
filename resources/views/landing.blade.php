
@extends('layouts.landing')

@section('title', 'SMART VOTE | Demokrasi Digital Masa Depan')

@section('content')

{{-- HERO SECTION --}}
<section id="beranda" class="relative min-h-[680px] overflow-hidden grid-pattern">

    <div class="glow-orb w-96 h-96 bg-blue-600/30 -top-20 -right-20"></div>
    <div class="glow-orb w-96 h-96 bg-indigo-600/20 bottom-0 -left-32"></div>

    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-950/20 to-slate-950"></div>

    <div class="relative max-w-7xl mx-auto px-6 pt-24 pb-24 grid lg:grid-cols-2 gap-16 items-center">

        {{-- HERO CONTENT --}}
        <div class="animate-fade-up">

            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full glass-panel text-blue-300 text-xs font-bold tracking-wider mb-8">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                INOVASI DEMOKRASI DIGITAL
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.12] tracking-tight">
                Masa Depan
                <span class="gradient-text">Demokrasi</span>
                Dimulai dari
                <span class="text-blue-400">Suara Anda.</span>
            </h1>

            <p class="text-slate-400 text-base md:text-lg leading-relaxed mt-8 max-w-xl">
                SMART VOTE menghadirkan pengalaman pemungutan suara digital
                yang modern, praktis, dan terarah untuk mendukung partisipasi
                demokrasi yang lebih baik.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mt-9">

                <a href="{{ route('register') }}"
                   class="btn-glow inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-500 font-bold shadow-xl shadow-blue-600/20">
                    Mulai Sekarang
                    <span>→</span>
                </a>

                <a href="{{ route('panduan') }}"
                   class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl border border-slate-700 hover:border-blue-500 hover:bg-blue-500/10 font-semibold transition">
                    Pelajari Sistem
                    <span>↗</span>
                </a>

            </div>

            <div class="flex flex-wrap gap-6 mt-10 text-sm text-slate-400">
                <span>✓ Mudah digunakan</span>
                <span>✓ Berbasis digital</span>
                <span>✓ Satu pemilih, satu suara</span>
            </div>

        </div>

        {{-- DASHBOARD VISUAL --}}
        <div class="relative animate-fade-up-delay">

            <div class="absolute inset-0 bg-blue-500/20 blur-[100px] rounded-full"></div>

            {{-- FLOATING CARD --}}
            <div class="absolute -top-8 -right-3 md:-right-8 z-20 glass-panel rounded-2xl px-5 py-4 float-delayed pulse-glow">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/15 flex items-center justify-center text-emerald-400 text-xl">
                        ✓
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Sistem Pemilihan</p>
                        <p class="font-bold text-sm">Digital & Terarah</p>
                    </div>
                </div>
            </div>

            {{-- MAIN CARD --}}
            <div class="relative glass-panel rounded-[2rem] p-5 md:p-7 float-slow">

                <div class="flex items-center justify-between border-b border-white/10 pb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center font-extrabold text-xl">
                            S
                        </div>
                        <div>
                            <p class="font-bold">SMART VOTE</p>
                            <p class="text-xs text-slate-400">Digital Election Platform</p>
                        </div>
                    </div>

                    <div class="px-3 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-bold">
                        ● ONLINE
                    </div>
                </div>

                {{-- VOTING PANEL --}}
                <div class="mt-7 rounded-2xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-6 md:p-8 relative overflow-hidden">

                    <div class="absolute w-48 h-48 rounded-full border border-white/10 -right-10 -top-16"></div>
                    <div class="absolute w-36 h-36 rounded-full border border-white/10 -right-5 -top-10"></div>

                    <p class="text-blue-100 text-sm">Selamat Datang di Era Baru</p>

                    <h2 class="text-2xl md:text-3xl font-extrabold mt-3 leading-tight">
                        Setiap Suara
                        <br>
                        Memiliki Arti.
                    </h2>

                    <p class="text-blue-100 text-sm mt-4 max-w-xs">
                        Berpartisipasi dalam pemilihan dengan cara yang lebih praktis.
                    </p>

                    <div class="flex items-center justify-between mt-8">
                        <div>
                            <p class="text-xs text-blue-200">Pengalaman Pemilihan</p>
                            <p class="font-bold mt-1">Digital Voting</p>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-3xl">
                            ✓
                        </div>
                    </div>
                </div>

                {{-- FEATURE CARDS --}}
                <div class="grid grid-cols-2 gap-4 mt-5">

                    <div class="rounded-2xl bg-slate-800/80 border border-white/5 p-5 card-hover">
                        <div class="text-2xl text-blue-400">◈</div>
                        <p class="text-xs text-slate-400 mt-4">Partisipasi</p>
                        <p class="font-bold mt-1">Pemilih Digital</p>
                    </div>

                    <div class="rounded-2xl bg-slate-800/80 border border-white/5 p-5 card-hover">
                        <div class="text-2xl text-indigo-400">▣</div>
                        <p class="text-xs text-slate-400 mt-4">Pengelolaan</p>
                        <p class="font-bold mt-1">Data Pemilihan</p>
                    </div>

                </div>

                {{-- SECURITY INFO --}}
                <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.03] p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-blue-500/15 text-blue-400 flex items-center justify-center text-xl">
                            ✓
                        </div>
                        <div>
                            <p class="font-bold text-sm">Satu Pemilih, Satu Suara</p>
                            <p class="text-xs text-slate-400 mt-1">
                                Mendukung proses pemilihan yang tertib.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FLOATING BOTTOM CARD --}}
            <div class="absolute -bottom-8 -left-3 md:-left-8 glass-panel rounded-2xl px-5 py-4 float-delayed">
                <p class="text-xs text-slate-400">Platform</p>
                <p class="font-bold text-blue-400 mt-1">SMART VOTE</p>
                <p class="text-xs text-slate-400 mt-1">Demokrasi Digital</p>
            </div>

        </div>

    </div>
</section>

{{-- BRAND MESSAGE --}}
<section class="relative border-y border-white/10 bg-slate-900/50 py-16">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <p class="text-blue-400 text-xs font-bold tracking-[0.3em] uppercase">
            Tentang SMART VOTE
        </p>

        <h2 class="text-3xl md:text-5xl font-extrabold mt-5 leading-tight">
            Teknologi untuk
            <span class="gradient-text">Demokrasi yang Lebih Baik.</span>
        </h2>

        <p class="text-slate-400 leading-relaxed max-w-3xl mx-auto mt-6">
            SMART VOTE dikembangkan sebagai platform pemungutan suara digital
            untuk mendukung edukasi demokrasi, partisipasi pemilih, dan
            pengelolaan proses pemilihan secara lebih terstruktur.
        </p>

    </div>
</section>

{{-- FEATURE SECTION --}}
<section class="relative py-24 overflow-hidden">

    <div class="glow-orb w-72 h-72 bg-blue-600/10 top-20 -left-20"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto">
            <p class="text-blue-400 text-xs font-bold tracking-[0.3em] uppercase">
                Keunggulan Platform
            </p>

            <h2 class="text-3xl md:text-5xl font-extrabold mt-5">
                Satu Platform,
                <span class="gradient-text">Banyak Kemudahan.</span>
            </h2>

            <p class="text-slate-400 mt-5 leading-relaxed">
                Fasilitas digital yang dirancang untuk membuat pengalaman
                pemilihan lebih praktis dan terorganisir.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">

            @foreach ([
                ['◈', 'Pemilihan Digital', 'Proses pemungutan suara dilakukan melalui platform digital yang mudah diakses.'],
                ['▣', 'Pengelolaan Terpusat', 'Data pemilihan, kandidat, dan pemilih dikelola dalam satu sistem.'],
                ['✓', 'Kontrol Partisipasi', 'Sistem membatasi satu pemilih untuk memberikan satu suara pada pemilihan yang sama.'],
                ['▤', 'Laporan Hasil', 'Hasil pemilihan dapat ditampilkan dan diekspor sebagai laporan.'],
                ['◎', 'Akses Pengguna', 'Pemilih dapat mengakses akun dan profil melalui perangkat masing-masing.'],
                ['♡', 'Edukasi Demokrasi', 'Mendukung pengenalan proses pemilihan dan partisipasi demokrasi secara digital.'],
            ] as $feature)

                <div class="glass-panel rounded-3xl p-8 card-hover">
                    <div class="w-14 h-14 rounded-2xl bg-blue-500/15 text-blue-400 flex items-center justify-center text-3xl">
                        {{ $feature[0] }}
                    </div>

                    <h3 class="text-xl font-bold mt-7">
                        {{ $feature[1] }}
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mt-3">
                        {{ $feature[2] }}
                    </p>
                </div>

            @endforeach

        </div>

        <div class="text-center mt-12">
            <a href="{{ route('keunggulan') }}"
               class="inline-flex items-center gap-3 text-blue-400 font-bold hover:text-blue-300 transition">
                Jelajahi Semua Keunggulan →
            </a>
        </div>

    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="py-24 bg-slate-900/50 border-y border-white/10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">
            <p class="text-blue-400 text-xs font-bold tracking-[0.3em] uppercase">
                Cara Kerja
            </p>

            <h2 class="text-3xl md:text-5xl font-extrabold mt-5">
                Mulai dalam
                <span class="gradient-text">Empat Langkah.</span>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">

            @foreach ([
                ['01', 'Buat Akun', 'Daftarkan akun pemilih dan lengkapi data diri.'],
                ['02', 'Masuk Sistem', 'Login menggunakan akun yang telah terdaftar.'],
                ['03', 'Pilih Kandidat', 'Pelajari kandidat dan gunakan hak pilih.'],
                ['04', 'Selesai', 'Sistem mencatat partisipasi pemilihan.'],
            ] as $step)

                <div class="relative glass-panel rounded-3xl p-7 card-hover">
                    <div class="text-5xl font-black text-blue-500/30">
                        {{ $step[0] }}
                    </div>

                    <h3 class="text-xl font-bold mt-6">
                        {{ $step[1] }}
                    </h3>

                    <p class="text-sm text-slate-400 leading-relaxed mt-3">
                        {{ $step[2] }}
                    </p>
                </div>

            @endforeach

        </div>

    </div>
</section>

{{-- CTA SECTION --}}
<section class="relative overflow-hidden py-24">

    <div class="absolute inset-0 bg-gradient-to-br from-blue-700/30 via-indigo-700/20 to-slate-950"></div>
    <div class="glow-orb w-96 h-96 bg-blue-500/20 -top-20 -right-20"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">

        <div class="inline-flex px-4 py-2 rounded-full glass-panel text-blue-300 text-xs font-bold mb-7">
            WAKTUNYA BERPARTISIPASI
        </div>

        <h2 class="text-4xl md:text-6xl font-extrabold leading-tight">
            Suara Anda Adalah
            <span class="gradient-text">Bagian dari Perubahan.</span>
        </h2>

        <p class="text-slate-300 mt-6 leading-relaxed max-w-2xl mx-auto">
            Kenali SMART VOTE dan mulai pengalaman demokrasi digital
            melalui platform pemungutan suara yang terstruktur.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">

            <a href="{{ route('register') }}"
               class="btn-glow px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-500 font-bold">
                Daftar Sekarang →
            </a>

            <a href="{{ route('login') }}"
               class="px-8 py-4 rounded-xl border border-white/20 hover:bg-white/10 font-semibold transition">
                Masuk ke Akun
            </a>

        </div>

    </div>
</section>

@endsection
