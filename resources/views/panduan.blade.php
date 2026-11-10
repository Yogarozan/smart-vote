@extends('layouts.landing')

@section('title', 'Panduan SMART VOTE')

@section('content')
<section class="py-24 min-h-[75vh]">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-blue-400 font-bold tracking-widest uppercase text-sm">
            Panduan Penggunaan
        </p>

        <h1 class="text-4xl md:text-5xl font-extrabold mt-5">
            Bagaimana Cara Menggunakan SMART VOTE?
        </h1>

        <p class="text-slate-400 mt-5 max-w-2xl">
            Ikuti tahapan berikut untuk menggunakan sistem pemungutan suara.
        </p>

        <div class="grid md:grid-cols-3 gap-6 mt-12">
            @foreach([
                ['01', 'Buat Akun', 'Daftarkan akun pemilih dengan mengisi informasi yang diperlukan.'],
                ['02', 'Masuk Sistem', 'Login menggunakan email dan password yang telah didaftarkan.'],
                ['03', 'Gunakan Hak Pilih', 'Pilih pemilihan yang tersedia dan tentukan kandidat pilihan Anda.'],
            ] as $step)
                <div class="rounded-2xl bg-slate-900 border border-slate-800 p-8">
                    <div class="text-4xl font-extrabold text-blue-500">
                        {{ $step[0] }}
                    </div>
                    <h2 class="font-bold text-xl mt-6">{{ $step[1] }}</h2>
                    <p class="text-slate-400 text-sm mt-3 leading-relaxed">
                        {{ $step[2] }}
                    </p>
                </div>
            @endforeach
        </div>

        <a href="{{ route('register') }}"
           class="inline-block mt-12 rounded-xl bg-blue-600 hover:bg-blue-500 px-8 py-4 font-bold">
            Daftar sebagai Pemilih →
        </a>
    </div>
</section>
@endsection