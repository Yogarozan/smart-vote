<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login SMART VOTE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#080f1f] flex items-center justify-center p-5">

    <div class="w-full max-w-md bg-slate-900 border border-slate-700 rounded-3xl p-8 shadow-2xl">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-400">
                SMART VOTE
            </h1>

            <p class="text-gray-400 mt-2">
                Sistem Pemungutan Suara Digital
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/20 text-red-300 p-3 rounded-xl mb-5">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">

            @csrf

            <label class="block mb-2">Email</label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Masukkan email"
                   required
                   class="w-full bg-slate-800 border border-slate-700 p-4 rounded-xl mb-5">

            <label class="block mb-2">Password</label>

            <input type="password"
                   name="password"
                   placeholder="Masukkan password"
                   required
                   class="w-full bg-slate-800 border border-slate-700 p-4 rounded-xl mb-6">

            <button class="w-full bg-blue-600 hover:bg-blue-500 p-4 rounded-xl font-bold">
                Masuk ke SMART VOTE
            </button>

        </form>

        <p class="text-gray-500 text-xs text-center mt-8">
            SMART VOTE — Mendukung Demokrasi Digital
        </p>

    </div>

</body>
</html>