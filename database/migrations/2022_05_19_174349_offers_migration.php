<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OffersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerte', function (Blueprint $table) {
            $table->bigIncrements('offerta_id')->unsigned()->index();
            $table->foreign('username_id')->references('username_id')->on('utenti');
            $table->string('titolo',40);
            $table->string('descrizione', 2000);
            $table->float('prezzo');
            $table->string('immagine', 100);
            $table->string('citta', 25);
            $table->string('via', 30);
            $table->unsignedSmallInteger('civico');
            $table->unsignedTinyInteger('eta_max');
            $table->unsignedTinyInteger('eta_min');
            $table->unsignedTinyInteger('genere_locatario');
            $table->date('disponibilita_inizio');
            $table->date('disponibilita_fine');
            $table->unsignedTinyInteger('posti_tot');
            $table->unsignedTinyInteger('tipologia');
            $table->unsignedTinyInteger('sup_appartamento');
            $table->unsignedTinyInteger('num_camere');
            $table->boolean('cucina');
            $table->boolean('locale_ricreativo');
            $table->string('servizi', 1000);
            $table->unsignedTinyInteger('sup_camera');
            $table->unsignedTinyInteger('posti_camera');
            $table->boolean('angolo_studio');
            $table->boolean('opzionabilita');
            $table->date('data_inserimento');
            $table->date('data_assegnazione');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerte');
    }
}
