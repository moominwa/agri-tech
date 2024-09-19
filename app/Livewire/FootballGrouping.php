<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Group;
use Livewire\Component;

class FootballGrouping extends Component
{
    public $group = [];

    public function mount()
    {
        // ดึงเฉพาะทีมที่ได้รับการอนุมัติแล้ว
        $teams = Team::with('group')->where('status', 'approved')->get(); // ใช้ where เพื่อกรองทีมที่ได้รับอนุมัติ

        // เตรียมข้อมูลเริ่มต้นสำหรับกลุ่มแต่ละทีม
        foreach ($teams as $team) {
            // กำหนดค่าเริ่มต้นเป็นชื่อกลุ่ม หรือ 'รอดำเนินการ' หากยังไม่มีการกำหนดกลุ่ม
            $this->group[$team->id] = $team->group->group_name ?? 'รอดำเนินการ';
        }
    }

    public function save()
{
    // วนลูปบันทึกข้อมูลกลุ่มที่เลือกสำหรับแต่ละทีม
    foreach ($this->group as $teamId => $group_name) {
        $team = Team::find($teamId); // ค้นหาทีมจาก ID

        if ($team && $team->status == 'approved') { // ตรวจสอบว่าเป็นทีมที่ได้รับอนุมัติ
            if ($group_name && $group_name !== 'รอดำเนินการ') { // ตรวจสอบว่า group_name ไม่เป็น null และไม่ใช่ 'รอดำเนินการ'
                // อัปเดตหรือสร้างกลุ่มสำหรับทีมที่ได้รับอนุมัติแล้ว
                Group::updateOrCreate(
                    ['team_id' => $team->id], // ค้นหากลุ่มตาม team_id
                    ['group_name' => $group_name] // กำหนดชื่อกลุ่มใหม่
                );
            }
        }
    }

    // แสดงข้อความบันทึกสำเร็จ
    session()->flash('message', 'บันทึกข้อมูลสำเร็จ!');
}


    public function render()
    {
        $teams = Team::with('group')->where('status', 'approved')->get(); // ดึงเฉพาะทีมที่ได้รับอนุมัติแล้ว
        return view('livewire.football-grouping', ['teams' => $teams]);
    }
}
