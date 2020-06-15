<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralappraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalappraisals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('code');
            $table->string('period');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('department');
            $table->string('period');
            $table->string('roledesc');
            $table->string('favorfactor');
            $table->string('constfactor');
            $table->string('solution');
            $table->string('trainingattended');
            $table->string('trainingneeded');
            $table->string('satisfywithrole');  
            $table->string('preferroleone');
            $table->string('preferroletwo');
            $table->string('preferrolethree');
            $table->string('comment');
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
        Schema::dropIfExists('generalappraisals');
    }
}
