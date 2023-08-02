<?php

namespace App\Http\Controllers\API\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Resume;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Candidate::all();
        $resumes = Candidate::find(2)->resumes;
        foreach($resumes as $resume){
            $resume->programming_skills = self::getProgrammingSkillsByResumeId($resume->resume_id);
        }
        // return Resume::find(18)->programmingSkills;
        return $resumes;
    }

    private static function getProgrammingSkillsByResumeId($resume_id){
        $skills_name = array();
        $skills = Resume::find($resume_id)->programmingSkills;
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
