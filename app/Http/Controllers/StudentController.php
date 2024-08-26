<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;

class StudentController extends Controller
{
    /**
     * Check if the student code exists.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkStudentCode(Request $request)
    {
        $studentCode = $request->input('student_code');
        $exists = User::where('student_code', $studentCode)->exists();

        return response()->json(['exists' => $exists]);
    }

    /**
     * Check if the team name exists.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkTeamName(Request $request)
    {
        $teamName = $request->input('team_name');
        $exists = Team::where('name', $teamName)->exists();

        return response()->json(['exists' => $exists]);
    }
}
