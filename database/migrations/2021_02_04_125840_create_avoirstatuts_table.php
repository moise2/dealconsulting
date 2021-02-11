<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvoirstatutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avoirstatuts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Point');
            $table->date('date_postuler');
            $table->unsignedInteger('id_postuler')
            ->references('id')
            ->on('postulers')
            ->ondelete('cascade')
            ->onupdate('cascade');
            $table->unsignedInteger('id_statut')
            ->references('id')
            ->on('statuts')   
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
        Schema::dropIfExists('avoirstatuts');
    }
}
