
@extends('layouts.app')

@section('title', 'Detail Pemilih')
@section('page-heading', 'Detail Pemilih')

@section('content')

<div class="max-w-3xl space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <p class="text-blue-400 text-sm font-semibold uppercase tracking-wider">
                Voter Management
            </p>
            <h2 class="text-2xl font-bold text-white mt-2">
                Detail Pemilih
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                Informasi lengkap akun pemilih SMART VOTE.
            </p>
        </div>

        <a href="{{ route('admin.voters.index') }}"
           class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-center transition">
            Kembali
        </a>
    </div>

    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 md:p-8">

        <div class="flex items-center gap-4 pb-6 border-b border-slate-800">
            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-2xl font-bold">
                {{ strtoupper(substr($voter->name, 0, 1)) }}
            </div>

            <div>
                <h3 class="text-xl font-bold text-white">
                    {{ $voter->name }}
                </h3>
                <p class="text-sm text-slate-400 mt-1">
                    ID Pemilih: #{{ $voter->id }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Nama Lengkap</p>
                <p class="text-white mt-2">{{ $voter->name }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">NISN</p>
                <p class="text-white mt-2">{{ $voter->nisn ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Email</p>
                <p class="text-white mt-2 break-all">{{ $voter->email }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Asal Sekolah</p>
                <p class="text-white mt-2">{{ $voter->voterProfile?->school ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Kelas</p>
                <p class="text-white mt-2">{{ $voter->voterProfile?->class ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Tempat Lahir</p>
                <p class="text-white mt-2">{{ $voter->voterProfile?->birth_place ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Tanggal Lahir</p>
                <p class="text-white mt-2">
                    {{ $voter->voterProfile?->birth_date?->format('d-m-Y') ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Jenis Kelamin</p>
                <p class="text-white mt-2">{{ $voter->voterProfile?->gender ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Nomor Telepon</p>
                <p class="text-white mt-2">{{ $voter->voterProfile?->phone ?? '-' }}</p>
            </div>

            <div>
                <p class="text-xs text-slate-500 uppercase tracking-wider">Role Akun</p>
                <p class="text-white mt-2">Pemilih</p>
            </div>

        </div>

        <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t border-slate-800">

            <a href="{{ route('admin.voters.edit', $voter->id) }}"
               class="px-5 py-3 rounded-xl bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 font-semibold transition">
                Edit Data
            </a>

            <a href="{{ route('admin.voters.index') }}"
               class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 transition">
                Kembali ke Daftar
            </a>

        </div>

    </div>

</div>

@endsection
