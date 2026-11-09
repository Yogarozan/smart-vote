<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with('election')
            ->latest()
            ->paginate(10);

        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $elections = Election::all();

        return view('admin.candidates.form', compact('elections'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'election_id' => ['required', 'exists:elections,id'],
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'vision' => ['required', 'string'],
            'mission' => ['required', 'string'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('candidates', 'public');
        }

        Candidate::create($data);

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    public function edit(Candidate $candidate)
    {
        $elections = Election::all();

        return view('admin.candidates.form', compact(
            'candidate',
            'elections'
        ));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $data = $request->validate([
            'election_id' => ['required', 'exists:elections,id'],
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'vision' => ['required', 'string'],
            'mission' => ['required', 'string'],
        ]);

        if ($request->hasFile('photo')) {
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }

            $data['photo'] = $request->file('photo')
                ->store('candidates', 'public');
        }

        $candidate->update($data);

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function destroy(Candidate $candidate)
    {
        if ($candidate->votes()->exists()) {
            return back()->withErrors([
                'delete' => 'Kandidat sudah memiliki suara dan tidak dapat dihapus.',
            ]);
        }

        if ($candidate->photo) {
            Storage::disk('public')->delete($candidate->photo);
        }

        $candidate->delete();

        return back()->with('success', 'Kandidat berhasil dihapus.');
    }
}
