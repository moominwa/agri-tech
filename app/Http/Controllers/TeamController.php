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
    // Validate the request data
    $validatedData = $request->validate([
        'team_name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'players' => 'required|array',
        'players.*.prefix' => 'required|string|max:255',
        'players.*.name' => 'required|string|max:255',
        'players.*.lastname' => 'required|string|max:255',
        'players.*.student_code' => 'required|string|max:255',
        'players.*.jersey_number' => 'required|string|max:255',
        'players.*.player_image' => 'nullable|file|image',
        'players.*.student_proof' => 'nullable|file|image',
    ]);

    // Process the validated data
    $team = Team::create([
        'team_name' => $validatedData['team_name'],
        'department' => $validatedData['department'],
        'type' => $validatedData['type'],
    ]);

    foreach ($request->players as $playerData) {
        if (isset($playerData['player_image'])) {
            $playerData['player_image'] = $playerData['player_image']->store('player_images');
        }
        if (isset($playerData['student_proof'])) {
            $playerData['student_proof'] = $playerData['student_proof']->store('student_proofs');
        }

        // Check for custom prefix
        if ($playerData['prefix'] === 'อื่นๆ' && isset($playerData['custom_prefix'])) {
            $playerData['prefix'] = $playerData['custom_prefix'];
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
