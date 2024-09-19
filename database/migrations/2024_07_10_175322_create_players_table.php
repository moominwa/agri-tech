<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->string('prefix');
            $table->string('name');
            $table->string('lastname');
            $table->string('student_code');
            $table->string('jersey_number');
            $table->integer('yellow_cards')->default(0); // เพิ่มคอลัมน์ ใบเหลือง
            $table->integer('red_cards')->default(0); // เพิ่มคอลัมน์ ใบแดง
            $table->integer('goals')->default(0); // เพิ่มคอลัมน์ จำนวนประตู
            $table->string('player_image')->nullable();
            $table->string('student_proof')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
