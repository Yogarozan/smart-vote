@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-2">
    {{ $election->title }}
</h1>

<p class="text-gray-400 mb-8">
    Pilih satu kandidat yang menurut Anda paling tepat.
</p>

@if($alreadyVoted)
    <div class="bg-green-600/20 text-green-300 p-5 rounded-xl">
        Anda sudah menggunakan hak suara pada pemilihan ini.
    </div>
@else

    @if($errors->any())
        <div class="bg-red-600/20 text-red-300 p-4 rounded-xl mb-5">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($candidates as $candidate)

        <div class="bg-slate-900 border border-slate-700 rounded-2xl p-5">

            @if($candidate->photo)
                <img src="{{ asset('storage/'.$candidate->photo) }}"
                     class="w-full h-56 object-cover rounded-xl mb-4">
            @endif

            <h2 class="text-xl font-bold">
                {{ $candidate->name }}
            </h2>

            <p class="text-gray-400 mt-3 text-sm">
                <strong>Visi:</strong>
                {{ $candidate->vision }}
            </p>

            <p class="text-gray-400 mt-3 text-sm">
                <strong>Misi:</strong>
                {{ $candidate->mission }}
            </p>

            <form method="POST"
                  action="{{ route('voter.vote.store', $election) }}"
                  onsubmit="return confirm('Apakah Anda yakin dengan pilihan ini?')">

                @csrf

                <input type="hidden"
                       name="candidate_id"
                       value="{{ $candidate->id }}">

                <button class="w-full bg-blue-600 hover:bg-blue-500 mt-5 p-3 rounded-xl">
                    Pilih Kandidat
                </button>

            </form>

        </div>

        @endforeach

    </div>

@endif

@endsection