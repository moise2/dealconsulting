<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom');
            $table->string('Prenoms');
            $table->string('Sexe');
            $table->string('Telephone');
            $table->string('Email');
            $table->string('Adresse');
            $table->string('Pays');
            $table->string('Anneexperiance');
            $table->string('Profile');
            $table->string('Cv');
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
        Schema::dropIfExists('experts');
    }
}
