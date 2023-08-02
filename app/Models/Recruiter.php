<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $table = 'recruiter';
    protected $primaryKey = 'recruiter_id';
    protected $guarded = [];
}
