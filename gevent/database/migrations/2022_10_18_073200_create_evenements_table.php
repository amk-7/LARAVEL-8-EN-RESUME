<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->bigIncrements("id_evenement");
            $table->string('nom');
            $table->float('montant');
            $table->dateTime('date'); // date et heur
            $table->json('adresse');
            $table->bigInteger('organisateur');
            $table->timestamps();
            $table->foreign("organisateur")->references("id_organisateur")->on("organisateurs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
