<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $primaryKey = 'job_id';
    protected $guarded = [];

    public function programmingSkills(){
        return $this->belongsToMany(ProgrammingSkill::class, 'job_skills', 'job_id', 'skill_id');
    }

    public function recruiter(){
        return $this->belongsTo(Recruiter::class, 'recruiter_id', 'recruiter_id');
    }
}
