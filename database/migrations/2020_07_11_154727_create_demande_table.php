<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->DATEtime('date');
            $table->enum('statut',['En attente','Accepté','Refusé'])->nullable();
            $table->enum('type',['SOCIAL', 'ACHAT LOGEMENT','VEHICULE','CONSTRUCTION'])->nullable();
            $table->boolean('valid_cu')->nullable();
            $table->boolean('valid_fin')->nullable();

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
        Schema::dropIfExists('demande');
    }
}
