
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 px-4 py-7 text-white sm:px-6 lg:px-8">
    <div class="mx-auto max-w-6xl space-y-7">

        {{-- HEADER --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-blue-400">
                SMART VOTE / ACCOUNT
            </p>
            <h1 class="mt-2 text-3xl font-extrabold sm:text-4xl">
                Profil Pengguna
            </h1>
            <p class="mt-2 text-sm text-slate-400">
                Kelola dan periksa informasi akun serta data pribadi Anda.
            </p>
        </div>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-300">
                <i class="mr-2">✓</i>
                {{ session('success') }}
            </div>
        @endif

        {{-- PROFILE HEADER --}}
        <div class="relative overflow-hidden rounded-3xl border border-blue-400/20 bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-950 p-6 sm:p-9">
            <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-blue-300/10 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center">
                <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-3xl border-4 border-white/20 bg-white text-3xl font-extrabold uppercase text-blue-800 shadow-xl">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="flex-1">
                    <span class="rounded-full border border-emerald-300/30 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">
                        ● Akun Pemilih Aktif
                    </span>

                    <h2 class="mt-3 text-2xl font-extrabold sm:text-3xl">
                        {{ $user->name }}
                    </h2>

                    <p class="mt-2 text-sm text-blue-100/80">
                        {{ $user->email }}
                    </p>

                    <p class="mt-1 text-sm text-blue-100/70">
                        NISN: {{ $user->nisn }}
                    </p>
                </div>

                <a href="{{ route('voter.profile.edit') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-800 shadow-lg transition hover:-translate-y-1 hover:bg-blue-50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M16.862 4.487l2.651 2.651M7 17l4-1 9-9a2 2 0 00-3-3l-9 9-1 4z"/>
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>

        {{-- INFORMASI AKUN --}}
        <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
            <div class="border-b border-slate-800 px-6 py-5">
                <h3 class="text-lg font-bold">Informasi Akun</h3>
                <p class="mt-1 text-sm text-slate-400">
                    Informasi identitas akun SMART VOTE Anda.
                </p>
            </div>

            <div class="grid gap-6 p-6 md:grid-cols-2">
                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Nama Lengkap</p>
                    <p class="mt-2 font-semibold">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Alamat Email</p>
                    <p class="mt-2 break-all font-semibold">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">NISN</p>
                    <p class="mt-2 font-semibold">{{ $user->nisn }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Tanggal Bergabung</p>
                    <p class="mt-2 font-semibold">
                        {{ $user->created_at->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        </section>

        {{-- DATA PRIBADI --}}
        <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
            <div class="flex items-center justify-between border-b border-slate-800 px-6 py-5">
                <div>
                    <h3 class="text-lg font-bold">Data Pribadi</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        Informasi pribadi dan identitas pemilih.
                    </p>
                </div>

                <div class="hidden h-11 w-11 items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-400 sm:flex">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M12 12a4 4 0 100-8 4 4 0 000 8zm-8 9a8 8 0 0116 0"/>
                    </svg>
                </div>
            </div>

            @if($profile)
                <div class="grid gap-6 p-6 md:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Tempat Lahir</p>
                        <p class="mt-2 font-semibold">{{ $profile->birth_place }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Tanggal Lahir</p>
                        <p class="mt-2 font-semibold">
                            {{ $profile->birth_date?->translatedFormat('d F Y') ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Jenis Kelamin</p>
                        <p class="mt-2 font-semibold">{{ $profile->gender }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Nomor Telepon</p>
                        <p class="mt-2 font-semibold">{{ $profile->phone ?: 'Belum diisi' }}</p>
                    </div>
                </div>
            @else
                <div class="p-6 text-sm text-amber-300">
                    Data profil belum tersedia. Silakan lengkapi melalui tombol Edit Profil.
                </div>
            @endif
        </section>

        {{-- DATA SEKOLAH --}}
        <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
            <div class="border-b border-slate-800 px-6 py-5">
                <h3 class="text-lg font-bold">Informasi Pendidikan</h3>
                <p class="mt-1 text-sm text-slate-400">
                    Informasi sekolah dan kelas pengguna.
                </p>
            </div>

            @if($profile)
                <div class="grid gap-6 p-6 md:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Nama Sekolah</p>
                        <p class="mt-2 font-semibold">{{ $profile->school }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Kelas</p>
                        <p class="mt-2 font-semibold">{{ $profile->class }}</p>
                    </div>
                </div>
            @else
                <div class="p-6 text-sm text-slate-400">
                    Informasi pendidikan belum tersedia.
                </div>
            @endif
        </section>

        {{-- SECURITY NOTE --}}
        <div class="flex gap-4 rounded-2xl border border-blue-500/20 bg-blue-500/5 p-5">
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="1.8"
                          d="M12 3l8 4v5c0 5-3.5 8-8 10-4.5-2-8-5-8-10V7l8-4z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="1.8" d="M9 12l2 2 4-4"/>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-blue-300">Keamanan Informasi Akun</h4>
                <p class="mt-1 text-sm leading-6 text-slate-400">
                    NISN dan email digunakan sebagai identitas akun. Perubahan
                    informasi identitas tersebut tidak tersedia melalui halaman ini.
                    Pastikan informasi profil lainnya selalu diperbarui.
                </p>
            </div>
        </div>

        <div class="pb-5 text-center text-xs text-slate-500">
            SMART VOTE — Sistem Pemilihan Elektronik
        </div>

    </div>
</div>

@endsection
