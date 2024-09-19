<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MatchResult;

class FootballMatchResults extends Component
{
    public $results;

    public function mount()
    {
        // ดึงข้อมูลผลการแข่งขันทั้งหมดพร้อมกับ fixture, homeTeam และ awayTeam จาก matches
        $this->results = MatchResult::with(['fixture.homeTeam', 'fixture.awayTeam'])->get();
    }

    public function render()
    {
        return view('livewire.football-match-results', ['results' => $this->results]);
    }
}
