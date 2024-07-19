<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'players' => 'required|array',
            'players.*.prefix' => 'required|string|max:255',
            'players.*.name' => 'required|string|max:255',
            'players.*.student_code' => 'required|string|max:255',
            'players.*.jersey_number' => 'required|string|max:255',
            'players.*.player_image' => 'nullable|file|image',
            'players.*.student_proof' => 'nullable|file|image',
        ]);

        $team = Team::create($validatedData);

        foreach ($request->players as $playerData) {
            if (isset($playerData['player_image'])) {
                $playerData['player_image'] = $playerData['player_image']->store('player_images');
            }
            if (isset($playerData['student_proof'])) {
                $playerData['student_proof'] = $playerData['student_proof']->store('student_proofs');
            }
            $team->players()->create($playerData);
        }

        return back()->with('success', 'ทีมและผู้เล่นถูกบันทึกเรียบร้อยแล้ว');
    }
    public function index()
    {
        // ดึงข้อมูลทีมทั้งหมดจากตาราง teams โดยใช้ Eloquent ORM
        $teams = Team::all();

        // ส่งข้อมูลไปยัง view player_information
        return view('teams.player_information', ['teams' => $teams]);
    }
}