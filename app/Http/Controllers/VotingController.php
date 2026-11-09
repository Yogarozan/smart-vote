<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use App\Models\VoterParticipation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VotingController extends Controller
{
    public function index(Election $election)
    {
        abort_unless(
            $election->status === 'active'
            && now()->between($election->start_at, $election->end_at),
            403,
            'Pemilihan tidak sedang berlangsung.'
        );

        $alreadyVoted = VoterParticipation::where(
            'election_id', $election->id
        )->where(
            'user_id', auth()->id()
        )->exists();

        $candidates = $election->candidates;

        return view('voter.voting', compact(
            'election',
            'candidates',
            'alreadyVoted'
        ));
    }

    public function store(Request $request, Election $election)
    {
        $data = $request->validate([
            'candidate_id' => ['required', 'integer'],
        ]);

        DB::transaction(function () use (
            $data,
            $election,
            $request
        ) {
            $currentElection = Election::whereKey($election->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $currentElection->status !== 'active'
                || !now()->between(
                    $currentElection->start_at,
                    $currentElection->end_at
                )
            ) {
                throw ValidationException::withMessages([
                    'vote' => 'Pemilihan sudah ditutup atau belum dimulai.',
                ]);
            }

            $candidate = $currentElection->candidates()
                ->whereKey($data['candidate_id'])
                ->first();

            if (!$candidate) {
                throw ValidationException::withMessages([
                    'vote' => 'Kandidat tidak valid.',
                ]);
            }

            $participation = VoterParticipation::where(
                'election_id', $currentElection->id
            )->where(
                'user_id', $request->user()->id
            )->exists();

            if ($participation) {
                throw ValidationException::withMessages([
                    'vote' => 'Anda sudah memberikan suara.',
                ]);
            }

            VoterParticipation::create([
                'election_id' => $currentElection->id,
                'user_id' => $request->user()->id,
                'voted_at' => now(),
            ]);

            Vote::create([
                'election_id' => $currentElection->id,
                'candidate_id' => $candidate->id,
            ]);
        });

        return redirect()->route('voter.dashboard')
            ->with('success', 'Suara berhasil disimpan.');
    }
}
