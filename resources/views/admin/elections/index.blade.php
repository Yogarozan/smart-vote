
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 text-white p-6 md:p-10">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center
                justify-between gap-4 mb-8">

        <div>
            <p class="text-blue-400 text-sm font-semibold mb-2">
                SMART VOTE / ADMINISTRASI
            </p>

            <h1 class="text-3xl font-bold">
                Manajemen Pemilihan
            </h1>

            <p class="text-slate-400 mt-2">
                Kelola seluruh kegiatan pemilihan digital.
            </p>
        </div>

        <a href="{{ route('admin.elections.create') }}"
           class="bg-blue-600 hover:bg-blue-500 px-5 py-3
                  rounded-xl font-semibold text-center transition">

            + Tambah Pemilihan

        </a>

    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/30
                    text-green-400 p-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30
                    text-red-400 p-4 rounded-xl mb-6">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">

        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-6">

            <p class="text-slate-400 text-sm">
                Total Pemilihan
            </p>

            <h2 class="text-3xl font-bold mt-3">
                {{ $elections->total() }}
            </h2>

        </div>

        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-6">

            <p class="text-slate-400 text-sm">
                Pemilihan Aktif
            </p>

            <h2 class="text-3xl font-bold text-green-400 mt-3">
                {{ \App\Models\Election::where('status', 'active')->count() }}
            </h2>

        </div>

        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-6">

            <p class="text-slate-400 text-sm">
                Pemilihan Selesai
            </p>

            <h2 class="text-3xl font-bold text-blue-400 mt-3">
                {{ \App\Models\Election::where('status', 'completed')->count() }}
            </h2>

        </div>

    </div>

    {{-- Tabel Pemilihan --}}
    <div class="bg-slate-900 border border-slate-800
                rounded-2xl overflow-hidden">

        <div class="p-6 border-b border-slate-800">

            <h2 class="text-xl font-bold">
                Daftar Pemilihan
            </h2>

            <p class="text-slate-400 text-sm mt-1">
                Informasi pemilihan yang terdaftar di sistem.
            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-slate-800/70 text-slate-300 text-sm">

                    <tr>
                        <th class="p-4">No.</th>
                        <th class="p-4">Nama Pemilihan</th>
                        <th class="p-4">Tanggal Mulai</th>
                        <th class="p-4">Tanggal Selesai</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($elections as $index => $election)

                        <tr class="border-t border-slate-800
                                   hover:bg-slate-800/40 transition">

                            <td class="p-4 text-slate-400">
                                {{ $elections->firstItem() + $index }}
                            </td>

                            <td class="p-4">

                                <p class="font-semibold">
                                    {{ $election->title }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $election->description ?: 'Tidak ada deskripsi' }}
                                </p>

                            </td>

                            <td class="p-4 text-sm text-slate-300">
                                {{ \Carbon\Carbon::parse($election->start_at)->format('d/m/Y H:i') }}
                            </td>

                            <td class="p-4 text-sm text-slate-300">
                                {{ \Carbon\Carbon::parse($election->end_at)->format('d/m/Y H:i') }}
                            </td>

                            <td class="p-4">

                                @if($election->status == 'active')

                                    <span class="bg-green-500/10 text-green-400
                                                 px-3 py-1 rounded-full text-xs">
                                        Aktif
                                    </span>

                                @elseif($election->status == 'completed')

                                    <span class="bg-blue-500/10 text-blue-400
                                                 px-3 py-1 rounded-full text-xs">
                                        Selesai
                                    </span>

                                @else

                                    <span class="bg-yellow-500/10 text-yellow-400
                                                 px-3 py-1 rounded-full text-xs">
                                        Draft
                                    </span>

                                @endif

                            </td>

                            <td class="p-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.elections.edit', $election->id) }}"
                                       class="bg-yellow-500/10 text-yellow-400
                                              px-3 py-2 rounded-lg text-xs
                                              hover:bg-yellow-500/20">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.elections.destroy', $election->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pemilihan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500/10 text-red-400
                                                       px-3 py-2 rounded-lg text-xs
                                                       hover:bg-red-500/20">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6"
                                class="p-12 text-center">

                                <div class="text-4xl mb-4">
                                    🗳️
                                </div>

                                <h3 class="text-lg font-semibold">
                                    Belum Ada Pemilihan
                                </h3>

                                <p class="text-slate-400 text-sm mt-2">
                                    Silakan tambahkan pemilihan pertama
                                    untuk memulai SMART VOTE.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="p-5 border-t border-slate-800">

            {{ $elections->links() }}

        </div>

    </div>

</div>

@endsection
