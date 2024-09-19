<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    use HasFactory;

    protected $fillable = ['home_team_id','away_team_id','fixture_id', 'home_team_goals', 'away_team_goals', 'result'];

    public function fixture()
{
    return $this->belongsTo(Fixture::class, 'fixture_id');
}

}

