<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'prefix', 'name', 'student_code', 'jersey_number', 'player_image', 'student_proof'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
