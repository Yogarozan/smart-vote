@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-3">
    Selamat Datang di SMART VOTE
</h1>

<p class="text-gray-400 mb-8">
    Gunakan hak suara Anda secara bijak dan bertanggung jawab.
</p>

@foreach($elections as $election)

<div class="bg-slate-900 border border-slate-700 rounded-2xl p-6 mb-5">

    <h2 class="text-xl font-bold">
        {{ $election->title }}
    </h2>

    <p class="text-gray-400 mt-2">
        {{ $election->description }}
    </p>

    <a href="{{ route('voter.vote', $election) }}"
       class="inline-block bg-blue-600 px-5 py-3 rounded-xl mt-5">
        Lihat Kandidat
    </a>

</div>

@endforeach

@endsection