<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_expert')
            ->references('id')
            ->on('experts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('id_postuler')
            ->references('id')
            ->on('postuler')
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
        Schema::dropIfExists('realisers');
    }
}
