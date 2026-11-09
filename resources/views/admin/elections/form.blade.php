
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 text-white p-6 md:p-10">

    <div class="max-w-4xl mx-auto">

        {{-- Tombol Kembali --}}
        <a href="{{ route('admin.elections.index') }}"
           class="text-slate-400 hover:text-white mb-6 inline-flex items-center gap-2">
            ← Kembali ke Daftar Pemilihan
        </a>

        {{-- Header --}}
        <div class="mb-8 mt-5">
            <p class="text-blue-400 text-sm font-semibold mb-2">
                SMART VOTE / ADMINISTRASI
            </p>

            <h1 class="text-3xl font-bold">
                {{ isset($election) ? 'Edit Pemilihan' : 'Tambah Pemilihan' }}
            </h1>

            <p class="text-slate-400 mt-2">
                Lengkapi informasi kegiatan pemilihan digital.
            </p>
        </div>

        {{-- Form --}}
        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-6 md:p-8">

            <form
                action="{{ isset($election)
                    ? route('admin.elections.update', $election->id)
                    : route('admin.elections.store') }}"
                method="POST">

                @csrf

                @if(isset($election))
                    @method('PUT')
                @endif

                {{-- Nama Pemilihan --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold mb-2">
                        Nama Pemilihan
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $election->title ?? '') }}"
                        placeholder="Contoh: Pemilihan Ketua OSIS 2026"
                        class="w-full bg-slate-800 border border-slate-700
                               rounded-xl p-3 text-white
                               focus:outline-none focus:border-blue-500"
                        required>

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Deskripsi --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold mb-2">
                        Deskripsi Pemilihan
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Masukkan deskripsi kegiatan pemilihan..."
                        class="w-full bg-slate-800 border border-slate-700
                               rounded-xl p-3 text-white
                               focus:outline-none focus:border-blue-500">{{ old('description', $election->description ?? '') }}</textarea>

                    @error('description')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Tanggal --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Tanggal dan Waktu Mulai
                        </label>

                        <input
                            type="datetime-local"
                            name="start_at"
                            value="{{ old('start_at', isset($election) ? \Carbon\Carbon::parse($election->start_at)->format('Y-m-d\TH:i') : '') }}"
                            class="w-full bg-slate-800 border border-slate-700
                                   rounded-xl p-3 text-white
                                   focus:outline-none focus:border-blue-500"
                            required>

                        @error('start_at')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Tanggal dan Waktu Selesai
                        </label>

                        <input
                            type="datetime-local"
                            name="end_at"
                            value="{{ old('end_at', isset($election) ? \Carbon\Carbon::parse($election->end_at)->format('Y-m-d\TH:i') : '') }}"
                            class="w-full bg-slate-800 border border-slate-700
                                   rounded-xl p-3 text-white
                                   focus:outline-none focus:border-blue-500"
                            required>

                        @error('end_at')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                {{-- Status --}}
                <div class="mb-8">

                    <label class="block text-sm font-semibold mb-2">
                        Status Pemilihan
                    </label>

                    <select
                        name="status"
                        class="w-full bg-slate-800 border border-slate-700
                               rounded-xl p-3 text-white
                               focus:outline-none focus:border-blue-500"
                        required>

                        <option value="draft"
                            {{ old('status', $election->status ?? 'draft') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="active"
                            {{ old('status', $election->status ?? '') == 'active' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="completed"
                            {{ old('status', $election->status ?? '') == 'completed' ? 'selected' : '' }}>
                            Selesai
                        </option>

                    </select>

                    @error('status')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-end">

                    <a href="{{ route('admin.elections.index') }}"
                       class="px-6 py-3 rounded-xl border border-slate-700
                              text-slate-300 hover:bg-slate-800 text-center">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-blue-600
                               hover:bg-blue-500 font-semibold transition">

                        {{ isset($election) ? 'Simpan Perubahan' : 'Simpan Pemilihan' }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
