<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class FootballGrouping extends Component
{
    public function render()
    {
        $team = Team ::all();

        return view('livewire.football-grouping',['teams'=>$team]);
    }
}
