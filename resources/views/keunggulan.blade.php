@extends('layouts.landing')

@section('title', 'Keunggulan SMART VOTE')

@section('content')
<section class="py-24 min-h-[75vh]">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-blue-400 font-bold tracking-widest uppercase text-sm">
            Keunggulan Sistem
        </p>

        <h1 class="text-4xl md:text-5xl font-extrabold mt-5 max-w-3xl">
            Fitur untuk Mendukung Pemilihan Digital.
        </h1>

        <p class="text-slate-400 mt-5 max-w-2xl">
            SMART VOTE menyediakan fasilitas yang mendukung
            pengelolaan dan pelaksanaan pemilihan.
        </p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
            @foreach([
                ['Pengelolaan Akun', 'Pengaturan akun dan identitas pemilih.'],
                ['Data Pemilih', 'Pengelolaan data pemilih secara terstruktur.'],
                ['Pemungutan Suara', 'Fasilitas pemilihan kandidat secara digital.'],
                ['Jadwal Pemilihan', 'Informasi waktu pelaksanaan pemilihan.'],
                ['Hasil Pemilihan', 'Penyajian rekapitulasi hasil voting.'],
                ['Laporan', 'Dukungan dokumentasi hasil pemilihan.'],
            ] as $item)
                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-7 hover:border-blue-500 transition">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-xl">
                        ✓
                    </div>
                    <h2 class="text-lg font-bold mt-6">{{ $item[0] }}</h2>
                    <p class="text-sm text-slate-400 mt-3">{{ $item[1] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection