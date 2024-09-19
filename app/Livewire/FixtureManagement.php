<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fixture;
use App\Models\Team;

class FixtureManagement extends Component
{
    public $fixtures = [];
    public $teams;

    public function mount()
    {
        // ดึงข้อมูลทีมทั้งหมดมาแสดง
        $this->teams = Team::all();

        // ดึงข้อมูลตารางการแข่งขันทั้งหมด
        $this->fixtures = Fixture::with(['homeTeam', 'awayTeam'])->get()->toArray();
    }

    public function addFixture()
    {
        // เพิ่มแถวใหม่ในตาราง
        $this->fixtures[] = [
            'home_team_id' => null,
            'away_team_id' => null,
            'date' => null,
            'time' => null,
            'venue' => null,
            'competition_type' => null,
            'round' => null,
        ];
    }

    public function saveFixture()
    {
        // วนลูปบันทึกหรืออัปเดตข้อมูลการแข่งขัน
        foreach ($this->fixtures as $fixture) {
            Fixture::updateOrCreate(
                ['home_team_id' => $fixture['home_team_id'], 'away_team_id' => $fixture['away_team_id']],
                $fixture
            );
        }

        session()->flash('message', 'บันทึกตารางการแข่งขันสำเร็จ!');
        $this->mount(); // โหลดข้อมูลใหม่
    }

    public function deleteFixture($index)
    {
        // ลบจากฐานข้อมูล
        if (isset($this->fixtures[$index]['id'])) {
            Fixture::where('id', $this->fixtures[$index]['id'])->delete();
        }

        // ลบแถวจาก fixtures ในหน้าจอ
        unset($this->fixtures[$index]);
        $this->fixtures = array_values($this->fixtures); // รีเซ็ตคีย์
    }

    public function render()
    {
        return view('livewire.fixture-management');
    }
}
