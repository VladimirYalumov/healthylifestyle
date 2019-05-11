<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->json('exercises');
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training');
    }
}
