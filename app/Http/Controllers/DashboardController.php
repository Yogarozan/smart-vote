<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\Election;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'totalVoters' => User::where('role', 'voter')->count(),
            'totalCandidates' => Candidate::count(),
            'totalVotes' => Vote::count(),
        ]);
    }

    public function voter()
    {
        $elections = Election::where('status', 'active')
        ->where('start_at', '<=', now())
        ->where('end_at', '>=', now())
        ->get();

    return view('voter.dashboard', compact('elections'));
    }
}
