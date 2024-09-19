<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\MatchResult;

class Scoreboard extends Component
{
    public $teams = [];

    public function mount()
    {
        $this->teams = Team::all();
    
        foreach ($this->teams as $team) {
            // ดึงข้อมูลผลการแข่งขันที่เกี่ยวข้องกับทีมนี้
            $homeResults = MatchResult::where('home_team_id', $team->id)->get();
            $awayResults = MatchResult::where('away_team_id', $team->id)->get();
    
            // คำนวณจำนวนแข่งขัน ชนะ เสมอ แพ้ ประตูได้ ประตูเสีย และคะแนนรวม
            $team->played = $homeResults->count() + $awayResults->count();
            $team->won = $homeResults->where('result', 'ชนะ')->count() + $awayResults->where('result', 'แพ้')->count();
            $team->draw = $homeResults->where('result', 'เสมอ')->count() + $awayResults->where('result', 'เสมอ')->count();
            $team->lost = $homeResults->where('result', 'แพ้')->count() + $awayResults->where('result', 'ชนะ')->count();
            $team->goals_for = $homeResults->sum('home_team_goals') + $awayResults->sum('away_team_goals');
            $team->goals_against = $homeResults->sum('away_team_goals') + $awayResults->sum('home_team_goals');
            $team->goal_difference = $team->goals_for - $team->goals_against;
            $team->points = ($team->won * 3) + ($team->draw * 1);
        }
    
        // จัดเรียงตามคะแนนก่อน แล้วผลต่างประตูได้เสียหากคะแนนเท่ากัน
        $this->teams = $this->teams->sort(function($a, $b) {
            // เรียงลำดับคะแนนก่อน
            if ($a->points == $b->points) {
                // หากคะแนนเท่ากัน ให้เรียงตามผลต่างประตู
                return $b->goal_difference <=> $a->goal_difference;
            }
            // เรียงลำดับตามคะแนน
            return $b->points <=> $a->points;
        })->values();  // เรียงใหม่แล้วทำให้ index กลับมาเริ่มต้นใหม่
        
    }
    
    public function render()
    {
        return view('livewire.scoreboard', ['teams' => $this->teams]);
    }
}
