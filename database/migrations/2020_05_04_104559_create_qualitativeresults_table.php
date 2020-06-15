<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualitativeresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualitativeresults', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->integer('userid');
            $table->integer('code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('department');
            $table->integer('supervisorname');
            
            $table->string('keyareaone')->nullable();
            $table->string('keyareatwo')->nullable();
            $table->string('keyareathree')->nullable();
            $table->string('keyareafour')->nullable();
            $table->string('keyareafive')->nullable();


            $table->string('accountabilityone');
            $table->string('accountabilitytwo');
            $table->string('accountabilitythree');
            $table->string('accountabilityfour');
            

            $table->string('reliabilityone');
            $table->string('reliabilitytwo');
            $table->string('reliabilitythree');
            $table->string('reliabilityfour');
            $table->string('reliabilityfive');


            $table->string('initiativeone');
            $table->string('initiativetwo');
            $table->string('initiativethree');
            $table->string('initiativefour');
            $table->string('initiativefive');
            $table->string('initiativesix');



            $table->string('customerfocusone');
            $table->string('customerfocustwo');
            $table->string('customerfocusthree');
            $table->string('customerfocusfour');
            $table->string('customerfocusfive');
            $table->string('customerfocussix');
         

            $table->string('efficiencyone');
            $table->string('efficiencytwo');
            $table->string('efficiencythree');
            $table->string('efficiencyfour');
            $table->string('efficiencyfive');
            $table->string('efficiencysix');
            $table->string('efficiencyseven');


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

            $table->string('score');

            $table->string('weakness');
            $table->string('strength');
            $table->string('trainingneeded');
            $table->string('supervisorcomment');
            $table->string('accepted')->nullable();
            $table->string('staffcomment')->nullable();
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
        Schema::dropIfExists('qualitativeresults');
    }
}
