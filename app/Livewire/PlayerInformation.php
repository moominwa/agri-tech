<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class PlayerInformation extends Component
{

    public function render()
    {
        $teams = Team::all();
        return view('livewire.player-information',['teams' => $teams]);
    }
}
