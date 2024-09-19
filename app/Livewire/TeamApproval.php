<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Player;

class TeamApproval extends Component
{
    public $teams;
    public $editingTeamId = null; // ใช้เก็บ ID ของทีมที่กำลังแก้ไข

    public function mount()
    {
        $this->teams = Team::all();  // ดึงข้อมูลทีมทั้งหมดมาแสดงในตาราง
    }

    public function startEdit($teamId)
    {
        $this->editingTeamId = $teamId;  // ตั้งค่า ID ของทีมที่กำลังแก้ไข
    }

    public function stopEdit()
    {
        $this->editingTeamId = null;  // ยกเลิกการแก้ไข
    }

    public function approve($teamId)
    {
        $team = Team::find($teamId);
        $team->status = 'approved';
        $team->save();

        $this->editingTeamId = null;  // ยกเลิกการแก้ไขหลังจากอนุมัติ
        session()->flash('status', 'Team has been approved successfully!');
    }

    public function reject($teamId)
    {
        $team = Team::find($teamId);
        $team->status = 'rejected';
        $team->save();

        $this->editingTeamId = null;  // ยกเลิกการแก้ไขหลังจากปฏิเสธ
        session()->flash('rejected', 'rejected');
    }

    public function render()
    {
        return view('livewire.team-approval');
    }
}
