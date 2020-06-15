<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantitativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        Schema::create('quantitatives', function (Blueprint $table) {

           $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('department');
            $table->integer('finconname');

            $table->string('targetbo')->nullable();
            $table->string('actualbo')->nullable();
            $table->string('weightbo')->nullable();

            $table->string('acctopentarget')->nullable();
            $table->string('acctopenactual')->nullable();
            $table->string('acctopenweight')->nullable();
            $table->string('acctopenscore')->nullable();

            $table->string('liagentarget')->nullable();
            $table->string('liagenactual')->nullable();
            $table->string('liagenweight')->nullable();
            $table->string('liagenscore')->nullable();

            $table->string('risktarget')->nullable();
            $table->string('riskactual')->nullable();
            $table->string('riskweight')->nullable();
            $table->string('riskscore')->nullable();

            $table->string('eproducttarget')->nullable();
            $table->string('eproductactual')->nullable();
            $table->string('eproductweight')->nullable();
            $table->string('eproductscore')->nullable();

            $table->string('feeandcomtarget')->nullable();
            $table->string('feeandcomactual')->nullable();
            $table->string('feeandcomweight')->nullable();
            $table->string('feeandcomscore')->nullable();

            $table->string('totrevtarget')->nullable();
            $table->string('totrevactual')->nullable();
            $table->string('totrevweight')->nullable();
            $table->string('totrevscore')->nullable();

            $table->string('partarget')->nullable();
            $table->string('paractual')->nullable();
            $table->string('parweight')->nullable();
            $table->string('parscore')->nullable();

            $table->string('crosstarget')->nullable();
            $table->string('crossactual')->nullable();
            $table->string('crossweight')->nullable();
            $table->string('crossscore')->nullable();

            $table->string('score')->nullable();
            $table->string('acceptance')->nullable();
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
        Schema::dropIfExists('quantitatives');
    }

}