
@extends('layouts.app')

@section('title', 'Tambah Pemilih')
@section('page-heading', 'Tambah Pemilih')

@section('content')

<div class="max-w-3xl space-y-6">

    <div>
        <p class="text-blue-400 text-sm font-semibold uppercase tracking-wider">
            Voter Management
        </p>
        <h2 class="text-2xl font-bold text-white mt-2">
            Tambah Pemilih Baru
        </h2>
        <p class="text-slate-400 text-sm mt-2">
            Tambahkan akun pemilih ke dalam sistem SMART VOTE.
        </p>
    </div>

    @if($errors->any())
        <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-300">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 md:p-8">

        <form action="{{ route('admin.voters.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="nama@email.com"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    NISN
                </label>
                <input
                    type="text"
                    name="nisn"
                    value="{{ old('nisn') }}"
                    required
                    placeholder="Masukkan NISN"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    minlength="8"
                    placeholder="Minimal 8 karakter"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-3">
                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition"
                >
                    Simpan Pemilih
                </button>

                <a
                    href="{{ route('admin.voters.index') }}"
                    class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-center transition"
                >
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
