<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Group; // อย่าลืมเพิ่มการอ้างอิงไปยังโมเดล Group
use Livewire\Component;

class FootballGrouping extends Component
{
    public $group = [];

    public function mount()
    {
        // เตรียมข้อมูลเริ่มต้นสำหรับกลุ่มแต่ละทีม
        $teams = Team::all();
        foreach ($teams as $team) {
            $this->group[$team->id] = $team->groups; // กำหนดค่าเริ่มต้นเป็นกลุ่มปัจจุบันของทีม
        }
    }

    public function save()
    {
        // วนลูปบันทึกข้อมูลกลุ่มที่เลือกสำหรับแต่ละทีม
        foreach ($this->group as $teamId => $group_name) {
            if ($group_name) { // ตรวจสอบว่า group_name ไม่เป็น null
                $team = Team::find($teamId); // ค้นหาทีมตามรหัสทีม

                if ($team) {
                    // กำหนดค่าให้กับกลุ่มในตาราง groups
                    Group::updateOrCreate(
                        ['team_id' => $team->id], // ตรวจสอบว่ามีกลุ่มอยู่แล้วหรือไม่
                        ['group_name' => $group_name] // อัปเดตหรือสร้างใหม่
                    );
                }
            }
        }

        // แสดงข้อความบันทึกสำเร็จ
        session()->flash('message', 'บันทึกข้อมูลสำเร็จ!');
    }

    public function render()
    {
        $teams = Team::all();
        return view('livewire.football-grouping', ['teams' => $teams]);
    }
}
