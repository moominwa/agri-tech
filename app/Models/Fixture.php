<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    // ระบุชื่อตารางให้ตรงกับฐานข้อมูล
    protected $table = 'matches';  // ใช้ matches ตามชื่อที่กำหนดในฐานข้อมูล

    protected $fillable = ['home_team_id', 'away_team_id', 'date', 'time', 'venue', 'competition_type', 'round'];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}