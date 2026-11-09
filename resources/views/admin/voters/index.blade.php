
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
                Kelola dan pantau seluruh akun pemilih SMART VOTE.
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
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm">Total Pemilih</p>
                    <h3 class="text-3xl font-bold text-white mt-3">
                        {{ number_format($totalVoters) }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-2">
                        Seluruh akun dengan role pemilih
                    </p>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-blue-500/10 flex items-center justify-center text-2xl">
                    👥
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm">Hasil Pencarian</p>
                    <h3 class="text-3xl font-bold text-white mt-3">
                        {{ $voters->total() }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-2">
                        Jumlah data sesuai filter
                    </p>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-2xl">
                    🔎
                </div>
            </div>
        </div>

    </div>

    {{-- TABEL PEMILIH --}}
    <div class="rounded-2xl border border-slate-800 bg-slate-900 overflow-hidden">

        <div class="p-5 md:p-6 border-b border-slate-800">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h3 class="text-lg font-bold text-white">
                        Daftar Seluruh Pemilih
                    </h3>
                    <p class="text-sm text-slate-400 mt-1">
                        Informasi akun yang terdaftar dalam sistem.
                    </p>
                </div>

                <form method="GET"
                      action="{{ route('admin.voters.index') }}"
                      class="flex flex-col sm:flex-row gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari nama, email, NISN..."
                        class="w-full sm:w-72 px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    <button type="submit"
                            class="px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-medium transition">
                        Cari
                    </button>

                    @if($search)
                        <a href="{{ route('admin.voters.index') }}"
                           class="px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-center transition">
                            Reset
                        </a>
                    @endif
                </form>

            </div>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px] text-left">

                <thead class="bg-slate-800/70 text-slate-400 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">No.</th>
                        <th class="px-6 py-4">Nama Pemilih</th>
                        <th class="px-6 py-4">NISN</th>
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
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="text-4xl mb-4">👥</div>
                                <h4 class="text-white font-semibold">
                                    Belum Ada Data Pemilih
                                </h4>
                                <p class="text-slate-400 text-sm mt-2">
                                    @if($search)
                                        Tidak ditemukan pemilih dengan kata kunci "{{ $search }}".
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
