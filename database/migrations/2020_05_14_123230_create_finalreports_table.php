<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalreports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('period')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('staffid')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('grade')->nullable();
            $table->string('depositactual')->nullable();
            $table->string('deposittarget')->nullable();
            $table->string('depositweight')->nullable();            
            $table->string('riskactual')->nullable();
            $table->string('risktarget')->nullable();
            $table->string('riskweight')->nullable();            
            $table->string('accountactual')->nullable();
            $table->string('accounttarget')->nullable();
            $table->string('accountweight')->nullable();
            $table->string('quantitativescore')->nullable();
            $table->string('qualitativescore')->nullable();
            $table->string('totalscore')->nullable();
            $table->string('interpretation')->nullable();
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('finalreports');
    }
}
