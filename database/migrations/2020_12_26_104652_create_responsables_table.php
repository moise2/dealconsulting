<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::disableForeignKeyConstraints();
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom');
            $table->string('Prenoms');
            $table->string('Sexe');
            $table->string('Email');
            $table->string('Telephone');
            $table->string('Adresse');
            $table->string('Pays');
            $table->unsignedInteger('id_poste')
            ->references('id')
            ->on('postes')
            ->ondelete('cascade')
            ->onupdate('cascade');
            $table->unsignedInteger('id_cabinet')
            ->refererences('id')
            ->on('cabinets')
            ->ondelete('cascade')
            ->onupdate('cascade');
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
        Schema::dropIfExists('responsables');
    }
}
