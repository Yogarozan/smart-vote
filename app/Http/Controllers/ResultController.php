<?php

namespace App\Http\Controllers;

use App\Exports\ElectionResultsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Election;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $elections = Election::latest()->get();

        $electionId = $request->query(
            'election_id',
            $elections->first()?->id
        );

        $election = $electionId
            ? Election::find($electionId)
            : null;

        $results = collect();

        $totalVoters = User::where('role', 'voter')->count();

        $totalParticipations = 0;
        $totalVotes = 0;
        $totalNotVoted = $totalVoters;
        $participationPercentage = 0;

        if ($election) {
            $totalParticipations = $election->participations()->count();

            $totalVotes = $election->votes()->count();

            $totalNotVoted = max(
                0,
                $totalVoters - $totalParticipations
            );

            $participationPercentage = $totalVoters > 0
                ? round(($totalParticipations / $totalVoters) * 100, 2)
                : 0;

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
                ->get()
                ->map(function ($result) use ($totalVotes) {
                    $result->percentage = $totalVotes > 0
                        ? round(
                            ($result->total_votes / $totalVotes) * 100,
                            2
                        )
                        : 0;

                    return $result;
                });
        }

        return view('admin.results', compact(
            'elections',
            'election',
            'results',
            'electionId',
            'totalVoters',
            'totalParticipations',
            'totalVotes',
            'totalNotVoted',
            'participationPercentage'
        ));
    }
    public function exportPdf(Request $request)
{
    $request->validate([
        'election_id' => ['required', 'exists:elections,id'],
    ]);

    $election = Election::findOrFail($request->election_id);

    $totalVoters = User::where('role', 'voter')->count();

    $totalParticipations = $election->participations()->count();

    $totalVotes = $election->votes()->count();

    $totalNotVoted = max(0, $totalVoters - $totalParticipations);

    $participationPercentage = $totalVoters > 0
        ? round(($totalParticipations / $totalVoters) * 100, 2)
        : 0;

    $results = DB::table('candidates')
        ->leftJoin('votes', function ($join) use ($election) {
            $join->on('candidates.id', '=', 'votes.candidate_id')
                ->where('votes.election_id', '=', $election->id);
        })
        ->where('candidates.election_id', $election->id)
        ->select(
            'candidates.name',
            DB::raw('COUNT(votes.id) as total_votes')
        )
        ->groupBy('candidates.id', 'candidates.name')
        ->orderByDesc('total_votes')
        ->get()
        ->map(function ($result) use ($totalVotes) {
            $result->percentage = $totalVotes > 0
                ? round(($result->total_votes / $totalVotes) * 100, 2)
                : 0;

            return $result;
        });

    $pdf = Pdf::loadView('admin.reports.pdf', compact(
        'election',
        'results',
        'totalVoters',
        'totalParticipations',
        'totalVotes',
        'totalNotVoted',
        'participationPercentage'
    ));

    return $pdf->download('laporan-smart-vote.pdf');
}
public function exportExcel(Request $request)
{
    $request->validate([
        'election_id' => ['required', 'exists:elections,id'],
    ]);

    $election = Election::findOrFail($request->election_id);

    $fileName = 'hasil-voting-' . $election->id . '.xlsx';

    return Excel::download(
        new ElectionResultsExport($election->id),
        $fileName
    );
}
}
