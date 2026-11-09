@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-2">
    Dashboard Admin
</h1>

<p class="text-gray-400 mb-8">
    Monitoring dan pengelolaan SMART VOTE.
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

    <div class="bg-slate-900 border border-slate-700 p-6 rounded-2xl">
        <p class="text-gray-400">Total Pemilih</p>
        <h2 class="text-3xl font-bold mt-3">
            {{ $totalVoters }}
        </h2>
    </div>

    <div class="bg-slate-900 border border-slate-700 p-6 rounded-2xl">
        <p class="text-gray-400">Total Kandidat</p>
        <h2 class="text-3xl font-bold mt-3">
            {{ $totalCandidates }}
        </h2>
    </div>

    <div class="bg-slate-900 border border-slate-700 p-6 rounded-2xl">
        <p class="text-gray-400">Total Suara</p>
        <h2 class="text-3xl font-bold mt-3">
            {{ $totalVotes }}
        </h2>
    </div>

</div>

@endsection