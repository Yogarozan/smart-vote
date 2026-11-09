@extends('layouts.app')

@section('content')

@php
    $editing = isset($candidate);
@endphp

<h1 class="text-2xl font-bold mb-6">
    {{ $editing ? 'Edit Kandidat' : 'Tambah Kandidat' }}
</h1>

<form method="POST"
      action="{{ $editing
        ? route('admin.candidates.update', $candidate)
        : route('admin.candidates.store') }}"
      enctype="multipart/form-data"
      class="bg-slate-900 border border-slate-700 p-6 rounded-2xl space-y-5">

    @csrf

    @if($editing)
        @method('PUT')
    @endif

    <div>
        <label class="block mb-2">Pemilihan</label>

        <select name="election_id"
                class="w-full bg-slate-800 p-3 rounded-xl">
            @foreach($elections as $election)
                <option value="{{ $election->id }}"
                    @selected(old('election_id', $candidate->election_id ?? '') == $election->id)>
                    {{ $election->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-2">Nama Kandidat</label>
        <input name="name"
               value="{{ old('name', $candidate->name ?? '') }}"
               class="w-full bg-slate-800 p-3 rounded-xl"
               required>
    </div>

    <div>
        <label class="block mb-2">Foto Kandidat</label>
        <input type="file"
               name="photo"
               accept="image/*"
               class="w-full bg-slate-800 p-3 rounded-xl">
    </div>

    <div>
        <label class="block mb-2">Visi</label>
        <textarea name="vision"
                  class="w-full bg-slate-800 p-3 rounded-xl"
                  required>{{ old('vision', $candidate->vision ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2">Misi</label>
        <textarea name="mission"
                  class="w-full bg-slate-800 p-3 rounded-xl"
                  required>{{ old('mission', $candidate->mission ?? '') }}</textarea>
    </div>

    <button class="bg-blue-600 hover:bg-blue-500 px-6 py-3 rounded-xl">
        Simpan Data
    </button>

    <a href="{{ route('admin.candidates.index') }}"
       class="ml-2 text-gray-400">
        Kembali
    </a>

</form>

@endsection