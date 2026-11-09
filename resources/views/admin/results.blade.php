@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Rekapitulasi Hasil Voting
</h1>

<form method="GET" class="mb-8">
    <select name="election_id"
            class="bg-slate-800 p-3 rounded-xl"
            onchange="this.form.submit()">

        @foreach($elections as $election)
            <option value="{{ $election->id }}"
                @selected($electionId == $election->id)>
                {{ $election->title }}
            </option>
        @endforeach

    </select>
</form>

<div class="bg-slate-900 border border-slate-700 rounded-2xl p-6">

    <table class="w-full text-left">

        <thead>
            <tr class="border-b border-slate-700">
                <th class="p-4">Kandidat</th>
                <th class="p-4">Jumlah Suara</th>
            </tr>
        </thead>

        <tbody>
            @forelse($results as $result)
                <tr class="border-b border-slate-800">
                    <td class="p-4">
                        {{ $result->name }}
                    </td>

                    <td class="p-4 font-bold text-blue-400">
                        {{ $result->total_votes }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="p-4 text-center">
                        Belum ada data suara.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection