<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->integer('bank_id');
            $table->integer('bank_repay_id');
            $table->date('payment_date');
            $table->time('payment_time');
            $table->decimal('payment_money', 10, 2);
            $table->string('payment_files');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
