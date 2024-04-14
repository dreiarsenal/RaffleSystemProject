<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('prize_id');
            $table->timestamp('won_at')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
