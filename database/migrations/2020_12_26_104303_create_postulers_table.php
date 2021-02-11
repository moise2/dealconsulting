<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::disableForeignKeyConstraints();
        Schema::create('postulers', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('Statut');
            $table->string('Proposition_t_f');
            $table->date('date_postuler');
            $table->unsignedInteger('id_montant')
            ->references('id')
            ->on('montants')
            ->ondelete('cascade')
            ->onupdate('cascade');
            $table->unsignedInteger('id_tdr')
            ->references('id')
            ->on('Tdrs')
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
        Schema::dropIfExists('postulers');
    }
}
