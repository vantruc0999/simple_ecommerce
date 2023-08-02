<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingSkill extends Model
{
    use HasFactory;
    protected $table = 'programming_skills';
    protected $primaryKey = 'skill_id';
    protected $guarded = [];

    public function resumes(){
        $this->belongsToMany(Resume::class,'resume_skills', 'resume_id', 'skill_id');
    }

    public function jobs(){
        $this->belongsToMany(Job::class,'job_skills', 'job_id', 'skill_id');
    }
}
