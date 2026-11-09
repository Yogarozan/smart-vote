<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMART VOTE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#080f1f] text-white">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6 hidden md:block">

            <h1 class="text-2xl font-bold text-blue-400 mb-10">
                SMART VOTE
            </h1>

            <nav class="space-y-3">

                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                       class="block p-3 rounded-xl hover:bg-slate-800">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.candidates.index') }}"
                       class="block p-3 rounded-xl hover:bg-slate-800">
                        Data Kandidat
                    </a>

                    <a href="{{ route('admin.elections.index') }}"
                       class="block p-3 rounded-xl hover:bg-slate-800">
                        Pemilihan
                    </a>

                    <a href="{{ route('admin.results') }}"
                       class="block p-3 rounded-xl hover:bg-slate-800">
                        Hasil Voting
                    </a>

                @else

                    <a href="{{ route('voter.dashboard') }}"
                       class="block p-3 rounded-xl hover:bg-slate-800">
                        Dashboard
                    </a>

                @endif

            </nav>

            <form method="POST" action="{{ route('logout') }}" class="mt-10">
                @csrf

                <button class="w-full bg-red-600/20 text-red-300 p-3 rounded-xl">
                    Logout
                </button>
            </form>

        </aside>

        <main class="flex-1 p-6 md:p-10">

            <header class="mb-8">
                <p class="text-gray-400">
                    Selamat datang, {{ auth()->user()->name }}
                </p>
            </header>

            @yield('content')

        </main>

    </div>

</body>
</html>