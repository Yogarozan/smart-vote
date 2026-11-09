
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | SMART VOTE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .main-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .20), transparent 35%),
                radial-gradient(circle at 90% 90%, rgba(14, 165, 233, .12), transparent 35%),
                #071426;
        }

        .glass {
            background: rgba(255, 255, 255, .055);
            border: 1px solid rgba(255, 255, 255, .10);
            backdrop-filter: blur(15px);
        }

        .input-field {
            transition: all .25s ease;
        }

        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, .12);
        }

        .primary-btn {
            background: linear-gradient(110deg, #2563eb, #0ea5e9);
            transition: all .25s ease;
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, .28);
        }

        .floating-card {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>

<body class="main-bg min-h-screen text-white">

    <div class="min-h-screen flex items-center justify-center p-4 lg:p-8">

        <div class="w-full max-w-6xl grid lg:grid-cols-2 overflow-hidden rounded-[28px] border border-white/10 shadow-2xl">

            <!-- LEFT SIDE -->
            <div class="hidden lg:flex flex-col justify-between p-12 relative overflow-hidden bg-gradient-to-br from-blue-950 via-slate-900 to-slate-950">

                <div class="absolute w-80 h-80 bg-blue-600/20 rounded-full blur-3xl -top-32 -left-20"></div>
                <div class="absolute w-72 h-72 bg-sky-500/10 rounded-full blur-3xl bottom-0 right-0"></div>

                <!-- BRAND -->
                <div class="relative z-10 flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-blue-500 flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <svg class="w-7 h-7" fill="none" stroke="white" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5-1a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="font-extrabold text-xl tracking-wide">SMART VOTE</h1>
                        <p class="text-xs text-blue-300 tracking-widest">DIGITAL VOTING PLATFORM</p>
                    </div>
                </div>

                <!-- HERO TEXT -->
                <div class="relative z-10 mt-12">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass text-blue-300 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-green-400"></span>
                        SMART & TRANSPARENT ELECTION
                    </span>

                    <h2 class="text-4xl xl:text-5xl font-extrabold leading-tight mt-7">
                        Suaramu,<br>
                        <span class="text-blue-400">Masa Depanmu.</span>
                    </h2>

                    <p class="text-slate-400 leading-7 mt-5 max-w-md">
                        Bergabunglah dalam pengalaman pemilihan digital
                        yang mudah, modern, dan transparan. Buat akunmu
                        dan gunakan hak pilih dengan bijak.
                    </p>
                </div>

                <!-- VOTING ILLUSTRATION -->
                <div class="relative z-10 flex justify-center items-center py-8">

                    <div class="relative w-72 h-64">

                        <div class="absolute inset-8 rounded-full bg-blue-500/10 blur-2xl"></div>

                        <div class="absolute left-3 top-8 glass rounded-2xl p-4 floating-card">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400">
                                    ✓
                                </div>
                                <div>
                                    <p class="text-xs font-bold">Your Vote</p>
                                    <p class="text-[10px] text-slate-400">Your Voice Matters</p>
                                </div>
                            </div>
                        </div>

                        <div class="absolute right-4 top-16 glass rounded-2xl p-4">
                            <div class="w-32 h-36 bg-slate-800 rounded-xl p-3 border border-blue-400/20">
                                <div class="flex justify-between items-center mb-3">
                                    <div class="w-6 h-6 bg-blue-500 rounded-md"></div>
                                    <span class="text-[9px] text-blue-300">E-VOTING</span>
                                </div>

                                <div class="h-2 bg-slate-600 rounded w-full mb-2"></div>
                                <div class="h-2 bg-slate-600 rounded w-3/4 mb-4"></div>

                                <div class="space-y-2">
                                    <div class="border border-blue-400 rounded-lg p-2 flex items-center gap-2">
                                        <div class="w-4 h-4 rounded-full bg-blue-500"></div>
                                        <div class="h-1.5 bg-slate-500 rounded w-12"></div>
                                    </div>
                                    <div class="border border-slate-600 rounded-lg p-2 flex items-center gap-2">
                                        <div class="w-4 h-4 rounded-full border border-slate-500"></div>
                                        <div class="h-1.5 bg-slate-500 rounded w-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute bottom-3 left-16 glass rounded-2xl px-5 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-green-500/20 flex items-center justify-center text-green-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold">Secure Voting</p>
                                    <p class="text-[10px] text-slate-400">Simple & Transparent</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="relative z-10 flex justify-between text-xs text-slate-500">
                    <span>SMART VOTE © 2026</span>
                    <span>Digital Election Experience</span>
                </div>
            </div>

            <!-- RIGHT SIDE FORM -->
            <div class="bg-white text-slate-900 p-7 sm:p-10 lg:p-12 flex flex-col justify-center">

                <div class="max-w-md w-full mx-auto">

                    <!-- MOBILE BRAND -->
                    <div class="lg:hidden flex items-center gap-3 mb-10">
                        <div class="w-11 h-11 bg-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5-1a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="font-extrabold text-xl">SMART VOTE</h1>
                            <p class="text-xs text-slate-500">DIGITAL VOTING PLATFORM</p>
                        </div>
                    </div>

                    <!-- HEADING -->
                    <div class="mb-8">
                        <p class="text-blue-600 text-sm font-bold tracking-wider mb-3">
                            CREATE YOUR ACCOUNT
                        </p>

                        <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                            Buat Akun Baru
                        </h2>

                        <p class="text-slate-500 text-sm mt-3 leading-6">
                            Mulai langkah pertamamu untuk berpartisipasi
                            dalam pemilihan digital bersama SMART VOTE.
                        </p>
                    </div>

                    <!-- STEP INDICATOR -->
                    <div class="mb-8">

                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm font-bold text-slate-800">Tahap 1</span>
                            <span class="text-xs font-semibold text-blue-600">1 dari 2 tahap</span>
                        </div>

                        <div class="flex gap-2">
                            <div class="h-2 flex-1 rounded-full bg-blue-600"></div>
                            <div class="h-2 flex-1 rounded-full bg-slate-200"></div>
                        </div>

                        <p class="text-xs text-slate-500 mt-3">
                            Buat akun dengan email dan password terlebih dahulu.
                        </p>
                    </div>

                    <!-- SESSION MESSAGE -->
                    @if(session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 text-sm mb-5">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 text-sm mb-5">
                            <p class="font-bold mb-1">Terjadi kesalahan</p>
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- FORM -->
                    <form action="{{ route('register.step1') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- EMAIL -->
                        <div>
                            <label for="email" class="block text-sm font-bold mb-2">
                                Alamat Email
                            </label>

                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="nama@email.com"
                                    class="input-field w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-4 text-sm outline-none">
                            </div>

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PASSWORD -->
                        <div>
                            <label for="password" class="block text-sm font-bold mb-2">
                                Password
                            </label>

                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M12 15v2m-7 4h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2zm3-11V7a4 4 0 118 0v4"/>
                                    </svg>
                                </div>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    placeholder="Minimal 8 karakter"
                                    class="input-field w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-14 py-4 text-sm outline-none">

                                <button type="button"
                                    onclick="togglePassword('password', 'eye1')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600">

                                    <svg id="eye1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>

                            <p class="text-xs text-slate-400 mt-2">
                                Gunakan minimal 8 karakter untuk keamanan akun.
                            </p>

                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-bold mb-2">
                                Konfirmasi Password
                            </label>

                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M12 15v2m-7 4h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2zm3-11V7a4 4 0 118 0v4"/>
                                    </svg>
                                </div>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Masukkan ulang password"
                                    class="input-field w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-14 py-4 text-sm outline-none">

                                <button type="button"
                                    onclick="togglePassword('password_confirmation', 'eye2')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600">

                                    <svg id="eye2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit"
                            class="primary-btn w-full text-white font-bold py-4 rounded-xl flex items-center justify-center gap-3 mt-3">
                            Lanjutkan Registrasi

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-6-6l6 6-6 6"/>
                            </svg>
                        </button>

                    </form>

                    <!-- LOGIN LINK -->
                    <div class="text-center mt-8">
                        <p class="text-sm text-slate-500">
                            Sudah memiliki akun?

                            <a href="{{ route('login') }}"
                                class="text-blue-600 font-bold hover:text-blue-800">
                                Masuk sekarang
                            </a>
                        </p>
                    </div>

                    <!-- FOOTER -->
                    <div class="border-t border-slate-100 mt-8 pt-6 text-center">
                        <p class="text-xs text-slate-400">
                            © 2026 SMART VOTE. Digital Voting Platform.
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            Mudah • Aman • Transparan
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.style.opacity = '0.5';
            } else {
                input.type = 'password';
                icon.style.opacity = '1';
            }
        }
    </script>

</body>
</html>
