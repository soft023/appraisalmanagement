<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerfociTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerfoci', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customerfocusone');
            $table->string('customerfocustwo');
            $table->string('customerfocusthree');
            $table->string('customerfocusfour');
            $table->string('customerfocusfive');
            $table->string('customerfocussix');
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
        Schema::dropIfExists('customerfoci');
    }
}
