<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_postuler')
            ->references('id')
            ->on('postulers')   
            ->ondelete('cascade')
            ->onupdate('cascade');
            $table->unsignedInteger('id_cabinet')
            ->references('id')
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
        Schema::dropIfExists('provenirs');
    }
}
