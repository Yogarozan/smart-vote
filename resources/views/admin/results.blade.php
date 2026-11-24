
@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-white">
        Rekapitulasi Hasil Voting
    </h1>
    <p class="text-slate-400 mt-2">
        Statistik suara dan tingkat partisipasi pemilih.
    </p>
</div>

<form method="GET" class="mb-8">
    <select name="election_id"
            class="bg-slate-800 text-white border border-slate-700 p-3 rounded-xl"
            onchange="this.form.submit()">
        @foreach($elections as $item)
            <option value="{{ $item->id }}"
                @selected($electionId == $item->id)>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
</form>

@if($election)
    <div class="flex flex-wrap gap-3 mb-8">

        <a href="{{ route('admin.results.pdf', ['election_id' => $electionId]) }}"
           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-semibold transition">
            <span>📄</span>
            Download PDF
        </a>

        <a href="{{ route('admin.results.excel', ['election_id' => $electionId]) }}"
            class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold transition">
            <span>📊</span>
            Export Excel
        </a>

                <button type="button"
                onclick="window.print()"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold transition no-print">
            <span>🖨️</span>
            Cetak Laporan
        </button>

    </div>
@endif

@if($election)

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

    <div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
        <p class="text-slate-400 text-sm">Total Pemilih</p>
        <h2 class="text-3xl font-bold text-white mt-3">
            {{ $totalVoters }}
        </h2>
    </div>

    <div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
        <p class="text-slate-400 text-sm">Sudah Memilih</p>
        <h2 class="text-3xl font-bold text-emerald-400 mt-3">
            {{ $totalParticipations }}
        </h2>
    </div>

    <div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
        <p class="text-slate-400 text-sm">Belum Memilih</p>
        <h2 class="text-3xl font-bold text-amber-400 mt-3">
            {{ $totalNotVoted }}
        </h2>
    </div>

    <div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
        <p class="text-slate-400 text-sm">Partisipasi</p>
        <h2 class="text-3xl font-bold text-blue-400 mt-3">
            {{ $participationPercentage }}%
        </h2>
    </div>

</div>

<div class="bg-slate-900 border border-slate-700 rounded-2xl p-6 mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-white">
            Tingkat Partisipasi Pemilih
        </h2>
        <span class="text-blue-400 font-bold">
            {{ $participationPercentage }}%
        </span>
    </div>

    <div class="w-full bg-slate-700 rounded-full h-4 overflow-hidden">
        <div class="bg-blue-500 h-4 rounded-full"
             style="width: {{ min(100, $participationPercentage) }}%">
        </div>
    </div>

    <p class="text-sm text-slate-400 mt-3">
        {{ $totalParticipations }} dari {{ $totalVoters }} pemilih telah berpartisipasi.
    </p>
</div>

<div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2 mb-6">
        <h2 class="text-xl font-bold text-white">
            Perolehan Suara Kandidat
        </h2>
        <span class="text-sm text-slate-400">
            Total suara masuk: {{ $totalVotes }}
        </span>
    </div>

    <div class="space-y-6">
        @forelse($results as $result)
            <div>
                <div class="flex justify-between items-center mb-2 gap-4">
                    <span class="text-white font-semibold">
                        {{ $result->name }}
                    </span>

                    <span class="text-blue-400 font-bold whitespace-nowrap">
                        {{ $result->total_votes }} suara
                        ({{ $result->percentage }}%)
                    </span>
                </div>

                <div class="w-full bg-slate-700 rounded-full h-4 overflow-hidden">
                    <div class="bg-blue-500 h-4 rounded-full"
                         style="width: {{ $result->percentage }}%">
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-slate-400 py-6">
                Belum ada data kandidat.
            </p>
        @endforelse
    </div>

    <div class="border-t border-slate-700 mt-8 pt-6">
        <h3 class="text-lg font-bold text-white mb-4">
            Tabel Rekapitulasi
        </h3>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-700 text-slate-400">
                        <th class="p-4">No.</th>
                        <th class="p-4">Nama Kandidat</th>
                        <th class="p-4">Jumlah Suara</th>
                        <th class="p-4">Persentase</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($results as $index => $result)
                        <tr class="border-b border-slate-800 text-white">
                            <td class="p-4">{{ $index + 1 }}</td>
                            <td class="p-4 font-medium">
                                {{ $result->name }}
                            </td>
                            <td class="p-4 text-blue-400 font-bold">
                                {{ $result->total_votes }}
                            </td>
                            <td class="p-4">
                                {{ $result->percentage }}%
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class="p-4 text-center text-slate-400">
                                Belum ada data suara.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
    <div class="bg-slate-900 border border-slate-700 rounded-2xl p-8 text-center">
        <p class="text-slate-400">
            Belum ada pemilihan yang dapat ditampilkan.
        </p>
    </div>
@endif

<style>
    @media print {
        @page {
            size: A4 portrait;
            margin: 15mm;
        }

        body {
            background: white !important;
            color: black !important;
        }

        aside,
        header,
        footer,
        nav,
        form,
        .no-print {
            display: none !important;
        }

        main {
            margin: 0 !important;
            padding: 0 !important;
        }

        main * {
            color: black !important;
            box-shadow: none !important;
        }

        main .bg-slate-900,
        main .bg-slate-800,
        main .bg-slate-700 {
            background: white !important;
        }

        main .border {
            border-color: #cccccc !important;
        }

        main .bg-blue-500 {
            background: #2563eb !important;
        }

        main .rounded-full {
            border: 1px solid #cccccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #cccccc;
            padding: 8px !important;
        }

        tr {
            page-break-inside: avoid;
        }
    }
</style>

@endsection
