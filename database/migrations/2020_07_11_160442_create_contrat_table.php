<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat', function (Blueprint $table) {
            $table->id();
            $table->float('frais_mensuel');
            $table->Integer('Duré');
            $table->float('somme_totale');
            $table->integer('id_pret');
            $table->integer('id_user');
            $table->DATEtime('date');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_pret')->references('id')->on('pret');

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
        Schema::dropIfExists('contrat');
    }
}
