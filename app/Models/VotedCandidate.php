<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotedCandidate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'candidate_voters';
    protected $fillable = [
        'voters_id',
        'candidate_id'
    ];
}
