<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Election;
class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $elections = Election::latest()->paginate(10);

    return view('admin.elections.index', compact('elections'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.elections.form');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_at' => 'required|date',
        'end_at' => 'required|date|after:start_at',
        'status' => 'required|in:draft,active,completed',
    ]);

    Election::create($data);

    return redirect()->route('admin.elections.index')
        ->with('success', 'Pemilihan berhasil dibuat.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
{
    return view('admin.elections.form', compact('election'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_at' => 'required|date',
        'end_at' => 'required|date|after:start_at',
        'status' => 'required|in:draft,active,completed',
    ]);

    $election->update($data);

    return redirect()->route('admin.elections.index')
        ->with('success', 'Pemilihan berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
{
    if (
        $election->votes()->exists()
        || $election->participations()->exists()
    ) {
        return back()->withErrors([
            'delete' => 'Pemilihan yang sudah memiliki aktivitas tidak dapat dihapus.',
        ]);
    }

    $election->delete();

    return back()->with('success', 'Pemilihan berhasil dihapus.');
}
}
