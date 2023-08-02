<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table = 'resume';
    protected $primaryKey = 'resume_id';
    protected $guarded = [];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }

    public function programmingSkills(){
        return $this->belongsToMany(ProgrammingSkill::class, 'resume_skills', 'resume_id', 'skill_id');
    }
}
