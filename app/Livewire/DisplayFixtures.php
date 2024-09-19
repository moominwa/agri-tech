<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fixture;

class DisplayFixtures extends Component
{
    public $fixtures;

    public function mount()
    {
        // ดึงข้อมูลการแข่งขันทั้งหมดจากฐานข้อมูล
        $this->fixtures = Fixture::with(['homeTeam', 'awayTeam'])->get();
    }

    public function render()
    {
        return view('livewire.display-fixtures');
    }
}
