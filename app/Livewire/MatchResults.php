<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MatchResult;
use App\Models\Fixture;

class MatchResults extends Component
{
    public $fixtures = [];
    public $results = [];

    public function mount()
    {
        // ดึงข้อมูลการจัดตารางแข่งขันทั้งหมดพร้อมกับทีมเหย้าและทีมเยือน
        $this->fixtures = Fixture::with(['homeTeam', 'awayTeam'])->get();

        // ดึงข้อมูลผลการแข่งขัน
        $this->results = MatchResult::all()->keyBy('fixture_id')->toArray();
    }


    public function saveResults()
    {
        // วนลูปบันทึกหรืออัปเดตผลการแข่งขัน
        foreach ($this->fixtures as $fixture) {
            // คำนวณผลการแข่งขัน
            $result = $this->calculateResult($fixture->id);
            // dd($fixture);
            // บันทึกผลการแข่งขัน
            MatchResult::updateOrCreate(
                ['fixture_id' => $fixture->id],  // ใช้ fixture_id เป็นตัวอ้างอิง
                [
                    'home_team_id' => $fixture->home_team_id,  // อ้างอิงจาก fixture
                    'away_team_id' => $fixture->away_team_id,  // อ้างอิงจาก fixture
                    'home_team_goals' => $this->results[$fixture->id]['home_team_goals'] ?? 0,
                    'away_team_goals' => $this->results[$fixture->id]['away_team_goals'] ?? 0,
                    'result' => $result,
                ]
            );

        }

        session()->flash('message', 'บันทึกผลการแข่งขันสำเร็จ!');
        $this->mount(); // โหลดข้อมูลใหม่
    }



    private function calculateResult($fixtureId)
    {
        $homeGoals = isset($this->results[$fixtureId]['home_team_goals']) ? $this->results[$fixtureId]['home_team_goals'] : 0;
        $awayGoals = isset($this->results[$fixtureId]['away_team_goals']) ? $this->results[$fixtureId]['away_team_goals'] : 0;

        if ($homeGoals > $awayGoals) {
            return 'ชนะ';
        } elseif ($homeGoals < $awayGoals) {
            return 'แพ้';
        } else {
            return 'เสมอ';
        }
    }

    public function render()
    {
        return view('livewire.match-results');
    }
}
