<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('othername');
            $table->string('staffid')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('profilepics')->nullable();
            $table->string('branch')->nullable();
            $table->string('departmentid');
            $table->string('supervisorid');
            $table->integer('rightfincon')->nullable();
            $table->integer('rightsupervisor')->nullable();
            $table->integer('rightmd')->nullable();
            $table->integer('righthr')->nullable();
            $table->string('positionid');
            $table->string('entrygradelevel')->nullable();
            $table->string('currentgradelevel')->nullable();
            $table->string('qualification')->nullable();
            $table->string('employmentstatus')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}


            