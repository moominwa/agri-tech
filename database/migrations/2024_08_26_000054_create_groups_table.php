<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // สร้างตาราง groups ที่เชื่อมโยงกับตาราง teams
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id'); // เชื่อมโยงกับตาราง teams
            $table->string('group_name');
            $table->timestamps();

            // กำหนด foreign key ให้กับ team_id
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
