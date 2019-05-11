<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('userID');
            $table->unsignedInteger('roleID');
            $table->unique(['userID', 'roleID']);
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('roleID')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
