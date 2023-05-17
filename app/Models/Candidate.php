<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate';
    protected $fillable = [
            'name',
            'information',
            'image_path'
    ];

    public function voters(){
        return $this->belongsToMany(Voters::class,
            'candidate_voters',
            'candidate_id',
            'voters_id');
    }
}
