<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchResultsTable extends Migration
{
    public function up()
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fixture_id'); // Foreign Key เชื่อมไปยังตาราง matches
            $table->integer('home_team_goals')->default(0);
            $table->integer('away_team_goals')->default(0);
            $table->string('result')->nullable();
            $table->timestamps();
        
            // Foreign Key ที่เชื่อมกับตาราง matches
            $table->foreign('fixture_id')->references('id')->on('matches')->onDelete('cascade');
        });
        
        
        
    }

    public function down()
    {
        Schema::dropIfExists('match_results');
    }
}