<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'department', 'type'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function group()
    {
        return $this->hasOne(Group::class); // 1 ทีม มี 1 กลุ่ม
    }
}
