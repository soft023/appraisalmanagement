<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReliabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reliabilities', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string('reliabilityone');
            $table->string('reliabilitytwo');
            $table->string('reliabilitythree');
            $table->string('reliabilityfour');
            $table->string('reliabilityfive');
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
        Schema::dropIfExists('reliabilities');
    }
}
