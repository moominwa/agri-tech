<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('match_results', function (Blueprint $table) {
        $table->unsignedBigInteger('home_team_id')->after('fixture_id');
        $table->unsignedBigInteger('away_team_id')->after('home_team_id');

        // Foreign key constraints
        $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
        $table->foreign('away_team_id')->references('id')->on('teams')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('match_results', function (Blueprint $table) {
        $table->dropForeign(['home_team_id']);
        $table->dropForeign(['away_team_id']);
        $table->dropColumn('home_team_id');
        $table->dropColumn('away_team_id');
    });
}

};
