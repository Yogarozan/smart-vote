@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold">Data Kandidat</h1>
        <p class="text-gray-400">Kelola seluruh kandidat pemilihan.</p>
    </div>

    <a href="{{ route('admin.candidates.create') }}"
       class="bg-blue-600 hover:bg-blue-500 px-5 py-3 rounded-xl">
        + Tambah Kandidat
    </a>
</div>

@if(session('success'))
    <div class="bg-green-600/20 text-green-300 p-4 rounded-xl mb-5">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-600/20 text-red-300 p-4 rounded-xl mb-5">
        {{ $errors->first() }}
    </div>
@endif

<div class="bg-slate-900 border border-slate-700 rounded-2xl overflow-x-auto">

<table class="w-full text-left">
    <thead class="bg-slate-800 text-gray-300">
        <tr>
            <th class="p-4">Foto</th>
            <th class="p-4">Nama Kandidat</th>
            <th class="p-4">Pemilihan</th>
            <th class="p-4">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($candidates as $candidate)
        <tr class="border-t border-slate-700">
            <td class="p-4">
                @if($candidate->photo)
                    <img src="{{ asset('storage/'.$candidate->photo) }}"
                         class="w-14 h-14 rounded-xl object-cover">
                @else
                    <div class="w-14 h-14 bg-slate-700 rounded-xl"></div>
                @endif
            </td>

            <td class="p-4 font-semibold">
                {{ $candidate->name }}
            </td>

            <td class="p-4 text-gray-400">
                {{ $candidate->election->title }}
            </td>

            <td class="p-4 flex gap-2">
                <a href="{{ route('admin.candidates.edit', $candidate) }}"
                   class="bg-yellow-600 px-3 py-2 rounded-lg">
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('admin.candidates.destroy', $candidate) }}"
                      onsubmit="return confirm('Hapus kandidat ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-600 px-3 py-2 rounded-lg">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="p-6 text-center text-gray-400">
                Belum ada data kandidat.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="p-4">
    {{ $candidates->links() }}
</div>

</div>

@endsection