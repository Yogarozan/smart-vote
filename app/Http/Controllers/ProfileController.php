<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Menampilkan profil pengguna.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $profile = $user->voterProfile;

        return view('voter.profile', compact('user', 'profile'));
    }

    /**
     * Menampilkan halaman edit profil.
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        $profile = $user->voterProfile;

        return view('voter.profile-edit', compact('user', 'profile'));
    }

    /**
     * Memperbarui data profil pengguna.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'school' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:50'],
            'phone' => ['nullable', 'string', 'max:20'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
            'gender.required' => 'Silakan pilih jenis kelamin.',
            'school.required' => 'Nama sekolah wajib diisi.',
            'class.required' => 'Kelas wajib diisi.',
        ]);

        DB::transaction(function () use ($user, $validated) {

            // Memperbarui nama pada tabel users.
            $user->update([
                'name' => $validated['name'],
            ]);

            // Memperbarui profil pada tabel voter_profiles.
            $profileData = collect($validated)
                ->except('name')
                ->toArray();

            $user->voterProfile()->updateOrCreate(
                ['user_id' => $user->id],
                $profileData
            );
        });

        return redirect()
            ->route('voter.profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
