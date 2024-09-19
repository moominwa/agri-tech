<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id', 'prefix', 'name', 'lastname', 'student_code', 'jersey_number', 
        'yellow_cards', 'red_cards', 'goals', 'player_image', 'student_proof'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

