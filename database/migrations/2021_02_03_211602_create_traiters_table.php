<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traiters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_expert')
            ->references('id')
            ->on('experts')
            ->ondelete('cascade')
            ->onupdate('cascade');
            $table->unsignedInteger('id_postuler')
            ->references('id')
            ->on('postulers')
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
        Schema::dropIfExists('traiters');
    }
}
