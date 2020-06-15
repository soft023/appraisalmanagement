<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyresultareaanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyresultareaanswers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('department');
            $table->integer('supervisorname');
            $table->string('resultone');
            $table->string('resulttwo');
            $table->string('resultthree');
            $table->string('resultfour');
            $table->string('resultfive');
            $table->string('resultsix')->nullable();
            $table->string('resultseven')->nullable();
            $table->string('resulteight')->nullable();
            $table->string('resultnine')->nullable();
            $table->string('resultten')->nullable();
            $table->string('keyresultweight');
            $table->string('score');
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
        Schema::dropIfExists('keyresultareaanswers');
    }
}
