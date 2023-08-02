<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $jobs = Job::all();
        foreach($jobs as $job){
            $job->skills_required = self::getProgammingSkillsByJobId($job->job_id);
            $job->company_name = Recruiter::find($job->recruiter_id)->company_name;
        }
        return $jobs;
        // $jobs = Recruiter::find(10);
        // return $jobs;
    }

    private static function getProgammingSkillsByJobId($job_id){
        $skills_name = array();
        $skills = Job::find($job_id)->programmingSkills;

        foreach($skills as $skill){
            $skills_name[] = $skill->skill_name;
        }

        return $skills_name;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
