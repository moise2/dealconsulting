<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->char('countryCode');
            $table->string('countryname');
            $table->char('currencyCode');
            $table->char('fipsCode');
            $table->char('isoNumeric');
            $table->string('north');
            $table->string('south');
            $table->string('east');
            $table->string('west');
            $table->string('capital');
            $table->string('continentName');
            $table->char('continent');
            $table->string('languages');
            $table->char('isoAlpha3');
            $table->integer('geonameId');
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
        Schema::dropIfExists('pays');
    }
}
