<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
        ];
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function participations()
    {
        return $this->hasMany(VoterParticipation::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}