<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('positionid');
            $table->string('keyareaone');
            $table->string('keyareatwo');
            $table->string('keyareathree');
            $table->string('keyareafour');
            $table->string('keyareafive');
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
        Schema::dropIfExists('keyareas');
    }
}
