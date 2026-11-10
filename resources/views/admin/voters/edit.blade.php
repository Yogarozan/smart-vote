
@extends('layouts.app')

@section('title', 'Edit Pemilih')
@section('page-heading', 'Edit Data Pemilih')

@section('content')

<div class="max-w-3xl space-y-6">

    {{-- HEADER --}}
    <div>
        <p class="text-blue-400 text-sm font-semibold uppercase tracking-wider">
            Voter Management
        </p>
        <h2 class="text-2xl font-bold text-white mt-2">
            Edit Data Pemilih
        </h2>
        <p class="text-slate-400 text-sm mt-2">
            Perbarui informasi akun dan profil lengkap pemilih.
        </p>
    </div>

    {{-- NOTIFIKASI ERROR --}}
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

        <form action="{{ route('admin.voters.update', $voter->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- DATA AKUN --}}
            <div>
                <h3 class="text-lg font-bold text-white mb-4">
                    Informasi Akun
                </h3>

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Nama Lengkap
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $voter->name) }}"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $voter->email) }}"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            NISN
                        </label>
                        <input
                            type="text"
                            name="nisn"
                            value="{{ old('nisn', $voter->nisn) }}"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <p class="text-xs text-slate-500 mt-2">
                            NISN harus unik untuk setiap pemilih.
                        </p>
                    </div>

                </div>
            </div>

            <div class="border-t border-slate-800"></div>

            {{-- DATA PROFIL --}}
            <div>
                <h3 class="text-lg font-bold text-white mb-2">
                    Informasi Profil Pemilih
                </h3>
                <p class="text-sm text-slate-400 mb-5">
                    Lengkapi informasi pribadi dan asal sekolah pemilih.
                </p>

                <div class="space-y-5">

                    {{-- TEMPAT LAHIR --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Tempat Lahir
                        </label>
                        <input
                            type="text"
                            name="birth_place"
                            value="{{ old('birth_place', $voter->voterProfile?->birth_place) }}"
                            placeholder="Contoh: Purwokerto"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    {{-- TANGGAL LAHIR --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Tanggal Lahir
                        </label>
                        <input
                            type="date"
                            name="birth_date"
                            value="{{ old('birth_date', $voter->voterProfile?->birth_date?->format('Y-m-d')) }}"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    {{-- JENIS KELAMIN --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Jenis Kelamin
                        </label>
                        <select
                            name="gender"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ old('gender', $voter->voterProfile?->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('gender', $voter->voterProfile?->gender) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- SEKOLAH --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Asal Sekolah
                        </label>
                        <input
                            type="text"
                            name="school"
                            value="{{ old('school', $voter->voterProfile?->school) }}"
                            placeholder="Masukkan nama sekolah"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    {{-- KELAS --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Kelas
                        </label>
                        <input
                            type="text"
                            name="class"
                            value="{{ old('class', $voter->voterProfile?->class) }}"
                            placeholder="Contoh: XII RPL 1"
                            required
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    {{-- TELEPON --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            Nomor Telepon
                        </label>
                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $voter->voterProfile?->phone) }}"
                            placeholder="Contoh: 08xxxxxxxxxx"
                            class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                </div>
            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-slate-800">

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition"
                >
                    Simpan Perubahan
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
