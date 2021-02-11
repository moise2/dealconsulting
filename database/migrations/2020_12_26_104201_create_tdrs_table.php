<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tdrs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_bailleur')
            ->references('id')
            ->on('bailleurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('id_type')
            ->references('id')
            ->on('types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('id_responsable')
            ->references('id')
            ->on('responsables')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('id_client')
            ->references('id')
            ->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('Nbr_expert');
            $table->date('Date_limite');
            $table->time('Heure');
            $table->string('N_reception');
            $table->string('Description');
            $table->string('Titre');
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
        Schema::dropIfExists('tdrs');
    }
}
