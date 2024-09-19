<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    // ฟังก์ชัน index สำหรับแสดงข้อมูลทีมทั้งหมด
    public function index()
{
    // ดึงข้อมูลทีมทั้งหมดจากฐานข้อมูล
    $teams = Team::with('players')->get(); // ดึงข้อมูลทีมพร้อมกับข้อมูลผู้เล่น
    
    // ส่งข้อมูลไปยัง view livewire.check-teams
    return view('livewire.check-teams', compact('teams'));
}


    // ฟังก์ชันสำหรับบันทึกข้อมูลทีมและผู้เล่น
    public function store(Request $request)
    {
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

    // ฟังก์ชันสำหรับแสดงรายละเอียดผู้เล่น (ตรวจสอบผู้เล่น)
    public function checkPlayer($teamId)
    {
        $team = Team::with('players')->findOrFail($teamId);
        return view('teams.check_player', compact('team'));
    }
}
