<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class CheckPlayer extends Component
{
    public $teams;
    public $selectedTeam; // ตัวแปรสำหรับเก็บข้อมูลทีมที่เลือก

    public function mount()
    {
        $this->teams = Team::all();
    }

    public function checkPlayer($teamId)
    {
        $this->selectedTeam = Team::findOrFail($teamId); // ค้นหาข้อมูลทีมที่เลือก

        // อาจแสดงข้อมูลที่ตรวจสอบแล้วหรือเปลี่ยนไปที่หน้าอื่น
        $this->emit('showPlayerDetails'); // ส่ง event เพื่อเปิด modal หรือแสดงรายละเอียด
    }

    public function approve($teamId)
    {
        $team = Team::findOrFail($teamId);
        $team->status = 'approved';
        $team->save();
    }

    public function reject($teamId)
    {
        $team = Team::findOrFail($teamId);
        $team->status = 'rejected';
        $team->save();
    }

    public function render()
    {
        return view('livewire.team-approval');
    }
}
