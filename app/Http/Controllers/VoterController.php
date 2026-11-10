<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VoterProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    /**
     * Menampilkan seluruh data pemilih dengan pencarian
     * dan filter berdasarkan asal sekolah.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $school = $request->query('school');

        // Mengambil daftar sekolah secara otomatis dari database.
        $schools = VoterProfile::whereHas('user', function ($query) {
                $query->where('role', 'voter');
            })
            ->whereNotNull('school')
            ->where('school', '!=', '')
            ->distinct()
            ->orderBy('school')
            ->pluck('school');

        // Query utama data pemilih.
        $voters = User::with('voterProfile')
            ->where('role', 'voter')

            // Filter pencarian.
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('nisn', 'like', "%{$search}%")
                        ->orWhereHas('voterProfile', function ($profile) use ($search) {
                            $profile->where('school', 'like', "%{$search}%");
                        });
                });
            })

            // Filter berdasarkan asal sekolah.
            ->when($school, function ($query) use ($school) {
                $query->whereHas('voterProfile', function ($profile) use ($school) {
                    $profile->where('school', $school);
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalVoters = User::where('role', 'voter')->count();

        return view('admin.voters.index', compact(
            'voters',
            'totalVoters',
            'search',
            'school',
            'schools'
        ));
    }

    /**
     * Form tambah pemilih.
     */
    public function create()
    {
        return view('admin.voters.create');
    }

    /**
     * Menyimpan pemilih baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nisn' => 'required|string|unique:users,nisn',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nisn' => $data['nisn'],
            'password' => Hash::make($data['password']),
            'role' => 'voter',
        ]);

        return redirect()->route('admin.voters.index')
            ->with('success', 'Pemilih berhasil ditambahkan.');
    }

    /**
     * Detail pemilih.
     */
    public function show(string $id)
    {
        $voter = User::where('role', 'voter')->findOrFail($id);

        return view('admin.voters.show', compact('voter'));
    }

    /**
     * Form edit pemilih.
     */
    public function edit(string $id)
    {
        $voter = User::where('role', 'voter')->findOrFail($id);

        return view('admin.voters.edit', compact('voter'));
    }

    /**
     * Memperbarui data pemilih.
     */
    public function update(Request $request, string $id)
    {
        $voter = User::where('role', 'voter')->findOrFail($id);

        $data = $request->validate([
            // Data akun
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $voter->id,
        'nisn' => 'required|string|unique:users,nisn,' . $voter->id,

        // Data profil
        'birth_place' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|in:Laki-laki,Perempuan',
        'school' => 'required|string|max:255',
        'class' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
    ]);

        $voter->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'nisn' => $data['nisn'],
        ]);

        $voter->voterProfile()->updateOrCreate(
        [],
        [
            'birth_place' => $data['birth_place'],
            'birth_date' => $data['birth_date'],
            'gender' => $data['gender'],
            'school' => $data['school'],
            'class' => $data['class'],
            'phone' => $data['phone'] ?? null,
        ]
    );

        return redirect()->route('admin.voters.index')
            ->with('success', 'Data pemilih berhasil diperbarui.');
    }

    /**
     * Menghapus pemilih.
     */
    public function destroy(string $id)
    {
        $voter = User::where('role', 'voter')->findOrFail($id);

        $voter->delete();

        return redirect()->route('admin.voters.index')
            ->with('success', 'Data pemilih berhasil dihapus.');
    }
}
