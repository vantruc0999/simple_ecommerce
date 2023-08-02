<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate';
    protected $primaryKey = 'candidate_id';
    protected $guarded = [];

    public function resumes(){
        return $this->hasMany(Resume::class, 'candidate_id', 'candidate_id');
    }
}
