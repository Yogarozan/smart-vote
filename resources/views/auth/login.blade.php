
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login SMART VOTE</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/smartvote-icon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#080f1f] text-white flex items-center justify-center px-4 py-8 sm:p-6">

    <div class="w-full max-w-md bg-slate-900/95 border border-slate-700 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-2xl">

{{-- LOGO DAN JUDUL --}}
<div class="text-center mb-7 sm:mb-8">

    <a href="{{ route('home') }}"
       class="inline-flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24
              rounded-3xl bg-white p-3
              border border-white/80
              shadow-xl shadow-blue-500/20
              hover:scale-105 transition duration-300 mb-5">

        <img src="{{ asset('images/smartvote-icon.svg') }}"
             alt="Logo SMART VOTE"
             class="w-full h-full object-contain">

    </a>
</div>


        {{-- PESAN ERROR --}}
        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-300 p-3 rounded-xl mb-5 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-3 rounded-xl mb-5 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login.process') }}" class="space-y-5">

            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold mb-2 text-slate-200">
                    Alamat Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    autocomplete="username"
                    required
                    class="w-full min-w-0 bg-slate-800 border border-slate-700 p-3.5 sm:p-4 rounded-xl text-white text-base outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-2 text-slate-200">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                    class="w-full min-w-0 bg-slate-800 border border-slate-700 p-3.5 sm:p-4 rounded-xl text-white text-base outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition"
                >
            </div>

            <button
                type="submit"
                class="w-full min-h-12 bg-blue-600 hover:bg-blue-500 active:scale-[0.98] p-3.5 sm:p-4 rounded-xl font-bold text-white shadow-lg shadow-blue-600/20 transition">
                Masuk ke SMART VOTE
            </button>

        </form>

        {{-- LINK REGISTRASI --}}
        <p class="text-center text-sm text-slate-400 mt-6">
            Belum memiliki akun?
            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                Daftar sekarang
            </a>
        </p>

        {{-- KEMBALI KE BERANDA --}}
        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="text-xs sm:text-sm text-slate-500 hover:text-blue-400 transition">
                ← Kembali ke Beranda
            </a>
        </div>

        <div class="border-t border-white/10 mt-7 pt-5">
            <p class="text-slate-500 text-xs text-center">
                SMART VOTE — Mendukung Demokrasi Digital
            </p>
        </div>

    </div>

</body>
</html>
