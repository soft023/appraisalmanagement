<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEfficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efficiencies', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('efficiencyone');
            $table->string('efficiencytwo');
            $table->string('efficiencythree');
            $table->string('efficiencyfour');
            $table->string('efficiencyfive');
            $table->string('efficiencysix');
            $table->string('efficiencyseven');
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
        Schema::dropIfExists('efficiencies');
    }
}
