<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ElectionResultsExport implements FromCollection, WithHeadings, WithTitle
{
    protected int $electionId;

    public function __construct(int $electionId)
    {
        $this->electionId = $electionId;
    }

    public function collection(): Collection
    {
        $totalVotes = DB::table('votes')
            ->where('election_id', $this->electionId)
            ->count();

        return DB::table('candidates')
            ->leftJoin('votes', function ($join) {
                $join->on('candidates.id', '=', 'votes.candidate_id')
                    ->where('votes.election_id', '=', $this->electionId);
            })
            ->where('candidates.election_id', $this->electionId)
            ->select(
                'candidates.name',
                DB::raw('COUNT(votes.id) as total_votes')
            )
            ->groupBy('candidates.id', 'candidates.name')
            ->orderByDesc('total_votes')
            ->get()
            ->map(function ($candidate, $index) use ($totalVotes) {
                return [
                    'no' => $index + 1,
                    'nama_kandidat' => $candidate->name,
                    'jumlah_suara' => (int) $candidate->total_votes,
                    'persentase' => $totalVotes > 0
                        ? round(($candidate->total_votes / $totalVotes) * 100, 2) . '%'
                        : '0%',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Kandidat',
            'Jumlah Suara',
            'Persentase',
        ];
    }

    public function title(): string
    {
        return 'Hasil Voting';
    }
}
