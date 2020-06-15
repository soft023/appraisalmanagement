<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionalisms', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('professionalismone');
            $table->string('professionalismtwo');
            $table->string('professionalismthree');
            $table->string('professionalismfour');
            $table->string('professionalismfive');
            $table->string('professionalismsix');
            $table->string('professionalismseven');            
            $table->string('professionalismeight');
            $table->string('professionalismnine');
            $table->string('professionalismten');
            $table->string('professionalismeleven');
            $table->string('professionalismtwelve');
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
        Schema::dropIfExists('professionalisms');
    }
}
