
@extends('layouts.app')

@section('title', 'Data Pemilih')
@section('page-heading', 'Manajemen Data Pemilih')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
        <div>
            <p class="text-blue-400 text-sm font-semibold tracking-wider uppercase">
                Voter Management
            </p>
            <h2 class="text-2xl md:text-3xl font-bold text-white mt-2">
                Data Pemilih
            </h2>
            <p class="text-slate-400 mt-2 text-sm">
                Kelola dan pantau data pemilih berdasarkan asal sekolah.
            </p>
        </div>

        <a href="{{ route('admin.voters.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-900/30 transition">
            <span class="text-xl">+</span>
            Tambah Pemilih
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-xl border border-red-500/30 bg-red-500/10 px-5 py-4 text-red-300">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
            <p class="text-slate-400 text-sm">Total Pemilih</p>
            <h3 class="text-3xl font-bold text-white mt-3">
                {{ number_format($totalVoters) }}
            </h3>
            <p class="text-xs text-slate-500 mt-2">
                Seluruh akun pemilih
            </p>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
            <p class="text-slate-400 text-sm">Asal Sekolah</p>
            <h3 class="text-3xl font-bold text-white mt-3">
                {{ $schools->count() }}
            </h3>
            <p class="text-xs text-slate-500 mt-2">
                Sekolah yang terdaftar
            </p>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
            <p class="text-slate-400 text-sm">Hasil Filter</p>
            <h3 class="text-3xl font-bold text-white mt-3">
                {{ number_format($voters->total()) }}
            </h3>
            <p class="text-xs text-slate-500 mt-2">
                Jumlah pemilih sesuai pencarian
            </p>
        </div>

    </div>

    {{-- TABEL PEMILIH --}}
    <div class="rounded-2xl border border-slate-800 bg-slate-900 overflow-hidden">

        {{-- HEADER DAN FILTER --}}
        <div class="p-5 md:p-6 border-b border-slate-800">

            <div class="mb-5">
                <h3 class="text-lg font-bold text-white">
                    Daftar Seluruh Pemilih
                </h3>
                <p class="text-sm text-slate-400 mt-1">
                    Cari pemilih atau kelompokkan berdasarkan asal sekolah.
                </p>
            </div>

            <form method="GET"
                  action="{{ route('admin.voters.index') }}"
                  class="grid grid-cols-1 md:grid-cols-12 gap-3">

                {{-- PENCARIAN --}}
                <div class="md:col-span-5">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari nama, email, NISN, sekolah..."
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                {{-- FILTER SEKOLAH --}}
                <div class="md:col-span-4">
                    <select
                        name="school"
                        onchange="this.form.submit()"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">Semua Sekolah</option>

                        @foreach($schools as $schoolOption)
                            <option value="{{ $schoolOption }}"
                                {{ $school == $schoolOption ? 'selected' : '' }}>
                                {{ $schoolOption }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- TOMBOL --}}
                <div class="md:col-span-3 flex gap-2">

                    <button type="submit"
                            class="flex-1 px-4 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">
                        Terapkan
                    </button>

                    @if($search || $school)
                        <a href="{{ route('admin.voters.index') }}"
                           class="px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 transition">
                            Reset
                        </a>
                    @endif

                </div>

            </form>

            {{-- FILTER AKTIF --}}
            @if($school)
                <div class="mt-4 flex items-center gap-2 text-sm">
                    <span class="text-slate-400">Filter sekolah:</span>
                    <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">
                        {{ $school }}
                    </span>
                </div>
            @endif

        </div>

        {{-- TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1050px] text-left">

                <thead class="bg-slate-800/70 text-slate-400 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">No.</th>
                        <th class="px-6 py-4">Nama Pemilih</th>
                        <th class="px-6 py-4">NISN</th>
                        <th class="px-6 py-4">Asal Sekolah</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800">

                    @forelse($voters as $index => $voter)

                        <tr class="hover:bg-slate-800/40 transition">

                            <td class="px-6 py-5 text-slate-400 text-sm">
                                {{ $voters->firstItem() + $index }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($voter->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-white">
                                            {{ $voter->name }}
                                        </p>
                                        <p class="text-xs text-slate-500 mt-1">
                                            ID: #{{ $voter->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-slate-300 text-sm">
                                {{ $voter->nisn ?? '-' }}
                            </td>

                            <td class="px-6 py-5 text-slate-300 text-sm">
                                {{ $voter->voterProfile?->school ?? '-' }}
                            </td>

                            <td class="px-6 py-5 text-slate-300 text-sm">
                                {{ $voter->email }}
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-semibold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    Terdaftar
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('admin.voters.show', $voter->id) }}"
                                       class="px-3 py-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 text-xs font-semibold">
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.voters.edit', $voter->id) }}"
                                       class="px-3 py-2 rounded-lg bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 text-xs font-semibold">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.voters.destroy', $voter->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus akun pemilih ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 text-xs font-semibold">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="text-4xl mb-4">👥</div>

                                <h4 class="text-white font-semibold">
                                    Data Pemilih Tidak Ditemukan
                                </h4>

                                <p class="text-slate-400 text-sm mt-2">
                                    @if($search || $school)
                                        Tidak ada pemilih yang sesuai dengan pencarian atau filter sekolah.
                                    @else
                                        Belum ada akun pemilih yang terdaftar dalam sistem.
                                    @endif
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        @if($voters->hasPages())
            <div class="p-5 border-t border-slate-800 text-sm text-slate-300">
                {{ $voters->links() }}
            </div>
        @endif

        <div class="px-6 py-4 border-t border-slate-800 text-xs text-slate-500">
            Menampilkan {{ $voters->count() }} dari {{ $voters->total() }} data pemilih.
        </div>

    </div>

</div>

@endsection
