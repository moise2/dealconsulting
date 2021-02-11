<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::disableForeignKeyConstraints();
        Schema::create('tranches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Libelle');
            $table->string('Tranche');
            $table->text('Fichier');
            $table->text('Date_tranche');
            $table->unsignedInteger('id_montant')
            ->references('id')
            ->on('montants')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('tranches');
    }
}
