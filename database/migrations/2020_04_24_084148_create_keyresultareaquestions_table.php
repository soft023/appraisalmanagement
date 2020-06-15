<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyresultareaquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyresultareaquestions', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('positionid');
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
        Schema::dropIfExists('keyresultareaquestions');
    }
}
