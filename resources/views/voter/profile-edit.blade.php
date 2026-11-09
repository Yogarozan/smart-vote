
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 px-4 py-7 text-white sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl space-y-7">

        {{-- HEADER --}}
        <div>
            <a href="{{ route('voter.profile') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-blue-400">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Profil
            </a>

            <p class="mt-6 text-sm font-semibold uppercase tracking-wider text-blue-400">
                SMART VOTE / EDIT PROFILE
            </p>
            <h1 class="mt-2 text-3xl font-extrabold sm:text-4xl">
                Edit Profil Pengguna
            </h1>
            <p class="mt-2 text-sm text-slate-400">
                Perbarui informasi pribadi Anda agar data akun tetap akurat.
            </p>
        </div>

        {{-- VALIDATION ERRORS --}}
        @if($errors->any())
            <div class="rounded-2xl border border-red-500/30 bg-red-500/10 p-5">
                <p class="font-bold text-red-300">
                    Terdapat kesalahan pada pengisian formulir:
                </p>
                <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-300">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('voter.profile.update') }}" method="POST"
              class="space-y-6">
            @csrf
            @method('PUT')

            {{-- AKUN --}}
            <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
                <div class="border-b border-slate-800 px-6 py-5">
                    <h2 class="text-lg font-bold">Identitas Akun</h2>
                    <p class="mt-1 text-sm text-slate-400">
                        Data identitas utama akun Anda.
                    </p>
                </div>

                <div class="grid gap-5 p-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold" for="name">
                            Nama Lengkap <span class="text-red-400">*</span>
                        </label>
                        <input id="name" name="name" type="text"
                               value="{{ old('name', $user->name) }}"
                               required maxlength="255"
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm text-white outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Email</label>
                        <input type="email" value="{{ $user->email }}"
                               disabled
                               class="w-full cursor-not-allowed rounded-xl border border-slate-800 bg-slate-800/70 px-4 py-3 text-sm text-slate-400">
                        <p class="mt-2 text-xs text-slate-500">Email tidak dapat diubah.</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">NISN</label>
                        <input type="text" value="{{ $user->nisn }}"
                               disabled
                               class="w-full cursor-not-allowed rounded-xl border border-slate-800 bg-slate-800/70 px-4 py-3 text-sm text-slate-400">
                        <p class="mt-2 text-xs text-slate-500">NISN tidak dapat diubah.</p>
                    </div>
                </div>
            </section>

            {{-- DATA PRIBADI --}}
            <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
                <div class="border-b border-slate-800 px-6 py-5">
                    <h2 class="text-lg font-bold">Data Pribadi</h2>
                    <p class="mt-1 text-sm text-slate-400">
                        Lengkapi informasi pribadi sesuai identitas Anda.
                    </p>
                </div>

                <div class="grid gap-5 p-6 md:grid-cols-2">

                    <div>
                        <label for="birth_place" class="mb-2 block text-sm font-semibold">
                            Tempat Lahir <span class="text-red-400">*</span>
                        </label>
                        <input id="birth_place" name="birth_place" type="text"
                               value="{{ old('birth_place', $profile?->birth_place) }}"
                               required maxlength="100"
                               placeholder="Contoh: Purwokerto"
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label for="birth_date" class="mb-2 block text-sm font-semibold">
                            Tanggal Lahir <span class="text-red-400">*</span>
                        </label>
                        <input id="birth_date" name="birth_date" type="date"
                               value="{{ old('birth_date', $profile?->birth_date?->format('Y-m-d')) }}"
                               max="{{ now()->format('Y-m-d') }}"
                               required
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label for="gender" class="mb-2 block text-sm font-semibold">
                            Jenis Kelamin <span class="text-red-400">*</span>
                        </label>
                        <select id="gender" name="gender" required
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki"
                                @selected(old('gender', $profile?->gender) === 'Laki-laki')>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                @selected(old('gender', $profile?->gender) === 'Perempuan')>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold">
                            Nomor Telepon
                        </label>
                        <input id="phone" name="phone" type="tel"
                               value="{{ old('phone', $profile?->phone) }}"
                               maxlength="20"
                               placeholder="Contoh: 08xxxxxxxxxx"
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                </div>
            </section>

            {{-- PENDIDIKAN --}}
            <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">
                <div class="border-b border-slate-800 px-6 py-5">
                    <h2 class="text-lg font-bold">Informasi Pendidikan</h2>
                    <p class="mt-1 text-sm text-slate-400">
                        Informasi sekolah dan kelas saat ini.
                    </p>
                </div>

                <div class="grid gap-5 p-6 md:grid-cols-2">
                    <div>
                        <label for="school" class="mb-2 block text-sm font-semibold">
                            Nama Sekolah <span class="text-red-400">*</span>
                        </label>
                        <input id="school" name="school" type="text"
                               value="{{ old('school', $profile?->school) }}"
                               required maxlength="255"
                               placeholder="Masukkan nama sekolah"
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label for="class" class="mb-2 block text-sm font-semibold">
                            Kelas <span class="text-red-400">*</span>
                        </label>
                        <input id="class" name="class" type="text"
                               value="{{ old('class', $profile?->class) }}"
                               required maxlength="50"
                               placeholder="Contoh: XI RPL 1"
                               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                </div>
            </section>

            {{-- ACTION BUTTON --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('voter.profile') }}"
                   class="rounded-xl border border-slate-700 px-6 py-3 text-center text-sm font-semibold text-slate-300 transition hover:bg-slate-800">
                    Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-blue-950/30 transition hover:bg-blue-500">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
