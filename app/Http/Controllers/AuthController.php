<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VoterProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // =========================
    // LOGIN
    // =========================

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Auth::user()->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('voter.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // =========================
    // REGISTRASI TAHAP 1
    // =========================

    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerStepOne(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan sementara di session.
        // Password langsung di-hash sebelum disimpan.
        $request->session()->put('registration', [
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('register.details');
    }

    // =========================
    // MENAMPILKAN TAHAP 2
    // =========================

    public function showRegisterDetails(Request $request)
    {
        if (!$request->session()->has('registration')) {
            return redirect()->route('register')
                ->with('error', 'Silakan lengkapi tahap pertama terlebih dahulu.');
        }

        return view('auth.register-details');
    }

    // =========================
    // REGISTRASI TAHAP 2
    // =========================

    public function registerStepTwo(Request $request)
    {
        $registration = $request->session()->get('registration');

        if (!$registration) {
            return redirect()->route('register')
                ->with('error', 'Sesi registrasi berakhir. Silakan mulai kembali.');
        }

        $validated = $request->validate([
            'nisn' => [
                'required',
                'digits:10',
                Rule::unique('users', 'nisn'),
            ],
            'name' => ['required', 'string', 'max:255'],
            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'school' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:50'],
            'phone' => ['nullable', 'string', 'max:20'],
        ], [
            'nisn.digits' => 'NISN harus terdiri dari 10 angka.',
            'nisn.unique' => 'NISN sudah digunakan oleh akun lain.',
            'birth_date.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
        ]);

        // Simpan akun dan profil secara bersamaan.
        DB::transaction(function () use ($validated, $registration) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $registration['email'],
                'password' => $registration['password'],
                'role' => 'voter',
                'nisn' => $validated['nisn'],
            ]);

            $user->voterProfile()->create([
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'gender' => $validated['gender'],
                'school' => $validated['school'],
                'class' => $validated['class'],
                'phone' => $validated['phone'] ?? null,
            ]);
        });

        // Hapus data sementara setelah berhasil.
        $request->session()->forget('registration');

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login menggunakan akun baru.');
    }

    // =========================
    // LOGOUT
    // =========================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
