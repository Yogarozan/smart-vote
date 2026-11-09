
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi - SMART VOTE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 flex items-center justify-center p-5">

    <div class="w-full max-w-2xl bg-slate-900 border border-slate-800 rounded-2xl p-8 text-white">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-400">SMART VOTE</h1>
            <p class="text-slate-400 mt-2">Lengkapi identitas diri untuk melanjutkan</p>
        </div>

        <div class="flex gap-2 mb-8">
            <div class="h-1.5 flex-1 bg-blue-500 rounded-full"></div>
            <div class="h-1.5 flex-1 bg-blue-500 rounded-full"></div>
        </div>

        <p class="text-sm text-blue-400 mb-2">LANGKAH 2 DARI 2</p>
        <h2 class="text-xl font-semibold mb-6">Data Pribadi Pemilih</h2>

        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 mb-6">
            <p class="text-sm text-blue-300">
                Pastikan seluruh informasi yang kamu masukkan benar.
                NISN hanya dapat digunakan untuk satu akun.
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl p-4 mb-6">
                <p class="font-semibold mb-2">Periksa kembali data berikut:</p>
                <ul class="list-disc pl-5 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.step2') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm mb-2">NISN</label>
                <input type="text" name="nisn"
                    value="{{ old('nisn') }}"
                    inputmode="numeric"
                    maxlength="10"
                    required
                    placeholder="Masukkan 10 digit NISN"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm mb-2">Nama Lengkap</label>
                <input type="text" name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm mb-2">Tempat Lahir</label>
                    <input type="text" name="birth_place"
                        value="{{ old('birth_place') }}"
                        required
                        placeholder="Contoh: Banyumas"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm mb-2">Tanggal Lahir</label>
                    <input type="date" name="birth_date"
                        value="{{ old('birth_date') }}"
                        max="{{ date('Y-m-d') }}"
                        required
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm mb-2">Jenis Kelamin</label>
                <select name="gender" required
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki" @selected(old('gender') == 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('gender') == 'Perempuan')>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm mb-2">Asal Sekolah</label>
                <input type="text" name="school"
                    value="{{ old('school') }}"
                    required
                    placeholder="Nama sekolah"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm mb-2">Kelas</label>
                    <input type="text" name="class"
                        value="{{ old('class') }}"
                        required
                        placeholder="Contoh: XII RPL 1"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm mb-2">Nomor HP (Opsional)</label>
                    <input type="tel" name="phone"
                        value="{{ old('phone') }}"
                        placeholder="08xxxxxxxxxx"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-4 py-3 outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-3">
                <a href="{{ route('register') }}"
                    class="text-center border border-slate-700 hover:bg-slate-800 py-3 px-6 rounded-xl">
                    Kembali
                </a>

                <button type="submit"
                    class="flex-1 bg-blue-600 hover:bg-blue-500 py-3 rounded-xl font-semibold transition">
                    Selesaikan Registrasi
                </button>
            </div>
        </form>

    </div>

</body>
</html>
