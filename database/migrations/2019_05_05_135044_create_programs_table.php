<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('message')->nullable();
            $table->unsignedInteger('coach_id')->nullable();
            $table->unsignedInteger('day_1');
            $table->unsignedInteger('day_2');
            $table->unsignedInteger('day_3');
            $table->unsignedInteger('day_4');
            $table->unsignedInteger('day_5');
            $table->unsignedInteger('day_6');
            $table->unsignedInteger('day_7');
            $table->foreign('day_1')->references('id')->on('training')->nullable();
            $table->foreign('day_2')->references('id')->on('training')->nullable();
            $table->foreign('day_3')->references('id')->on('training')->nullable();
            $table->foreign('day_4')->references('id')->on('training')->nullable();
            $table->foreign('day_5')->references('id')->on('training')->nullable();
            $table->foreign('day_6')->references('id')->on('training')->nullable();
            $table->foreign('day_7')->references('id')->on('training')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
