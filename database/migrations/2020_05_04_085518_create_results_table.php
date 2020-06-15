<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('department');
            $table->integer('hrname');
            $table->string('hrcomandrecom');
            $table->string('mdname')->nullable();
            $table->string('mdcomandrecom')->nullable();
            $table->string('resultinpercentage');
            $table->string('resultinterpretation');
            $table->string('status');
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
        Schema::dropIfExists('results');
    }
}
