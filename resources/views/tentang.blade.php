@extends('layouts.landing')

@section('title', 'Tentang SMART VOTE')

@section('content')
<section class="min-h-[75vh] py-24">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-blue-400 font-bold tracking-widest uppercase text-sm">
            Tentang SMART VOTE
        </p>

        <h1 class="text-4xl md:text-6xl font-extrabold mt-5 max-w-3xl">
            Mengenal SMART VOTE dan Tujuan Pengembangannya.
        </h1>

        <p class="text-slate-400 text-lg leading-relaxed mt-8 max-w-3xl">
            SMART VOTE merupakan sistem pemungutan suara digital berbasis
            teknologi yang dirancang untuk mendukung proses demokrasi
            melalui pengelolaan pemilih, kandidat, pemilihan, dan hasil suara.
        </p>

        <div class="grid md:grid-cols-2 gap-6 mt-14">
            <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800">
                <h2 class="text-xl font-bold">Tujuan</h2>
                <p class="text-slate-400 mt-3 leading-relaxed">
                    Mendukung proses pemilihan yang mudah dipahami,
                    terorganisir, dan dapat diakses secara digital.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800">
                <h2 class="text-xl font-bold">Peran Teknologi</h2>
                <p class="text-slate-400 mt-3 leading-relaxed">
                    Membantu pengelolaan data pemilih, kandidat,
                    pelaksanaan voting, dan rekapitulasi hasil.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection