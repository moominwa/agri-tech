<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fixture;
use App\Models\Player;
use App\Models\Team;

class PlayerStatistics extends Component
{
    public $fixtures = [];
    public $players = [];
    public $selectedFixture;
    public $showModal = false;
    
    public function mount()
    {
        // ดึงข้อมูลตารางแข่งขันทั้งหมดพร้อมทีมเหย้าและทีมเยือน
        $this->fixtures = Fixture::with(['homeTeam', 'awayTeam'])->get();
    }

    public function managePlayerStats($fixtureId)
    {
        // ดึงข้อมูลผู้เล่นจากทีมที่เกี่ยวข้องกับการแข่งขันนี้
        $fixture = Fixture::with(['homeTeam.players', 'awayTeam.players'])->find($fixtureId);
        $this->players = [
            'home' => $fixture->homeTeam->players,
            'away' => $fixture->awayTeam->players
        ];

        $this->selectedFixture = $fixture;
        $this->showModal = true; // แสดง modal
    }

    public function savePlayerStats()
{
    try {
        // อัปเดตข้อมูลทีมเจ้าบ้าน
        foreach ($this->players['home'] as $playerData) {
            $player = Player::find($playerData['id']); // ค้นหาผู้เล่นตาม ID
            if ($player) {
                $player->yellow_cards = $playerData['yellow_cards'] ?? 0;
                $player->red_cards = $playerData['red_cards'] ?? 0;
                $player->goals = $playerData['goals'] ?? 0;
                $player->save(); // บันทึกข้อมูลผู้เล่น
            } else {
                session()->flash('error', 'ไม่พบผู้เล่นที่ ID: ' . $playerData['id']);
            }
        }

        // อัปเดตข้อมูลทีมเยือน
        foreach ($this->players['away'] as $playerData) {
            $player = Player::find($playerData['id']); // ค้นหาผู้เล่นตาม ID
            if ($player) {
                $player->yellow_cards = $playerData['yellow_cards'] ?? 0;
                $player->red_cards = $playerData['red_cards'] ?? 0;
                $player->goals = $playerData['goals'] ?? 0;
                $player->save(); // บันทึกข้อมูลผู้เล่น
            } else {
                session()->flash('error', 'ไม่พบผู้เล่นที่ ID: ' . $playerData['id']);
            }
        }

        session()->flash('message', 'บันทึกสถิติของผู้เล่นสำเร็จ!');
    } catch (\Exception $e) {
        session()->flash('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage());
    }

    $this->showModal = false; // ปิด modal
}


    

    public function render()
    {
        return view('livewire.player-statistics', [
            'fixtures' => $this->fixtures
        ]);
    }
}
