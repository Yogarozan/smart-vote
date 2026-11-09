<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoterParticipation extends Model
{
    protected $fillable = [
        'election_id',
        'user_id',
        'voted_at',
    ];

    protected function casts(): array
    {
        return [
            'voted_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}