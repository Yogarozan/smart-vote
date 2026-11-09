<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $elections = Election::all();

        $electionId = $request->query(
            'election_id',
            $elections->first()?->id
        );

        $results = collect();

        if ($electionId) {
            $results = DB::table('candidates')
                ->leftJoin('votes', function ($join) use ($electionId) {
                    $join->on('candidates.id', '=', 'votes.candidate_id')
                        ->where('votes.election_id', '=', $electionId);
                })
                ->where('candidates.election_id', $electionId)
                ->select(
                    'candidates.id',
                    'candidates.name',
                    'candidates.photo',
                    DB::raw('COUNT(votes.id) as total_votes')
                )
                ->groupBy(
                    'candidates.id',
                    'candidates.name',
                    'candidates.photo'
                )
                ->orderByDesc('total_votes')
                ->get();
        }

        return view('admin.results', compact(
            'elections',
            'results',
            'electionId'
        ));
    }
}
