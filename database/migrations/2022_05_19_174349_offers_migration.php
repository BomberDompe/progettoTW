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
            $table->string('username_id')->index();
            $table->foreign('username_id')->references('username')->on('users');
            $table->string('titolo', 100);
            $table->string('descrizione', 2000);
            $table->float('prezzo');
            $table->string('immagine', 100)->nullable();
            $table->string('citta', 25);
            $table->string('via', 30);
            $table->unsignedInteger('civico');
            $table->unsignedInteger('eta_max')->nullable();
            $table->unsignedInteger('eta_min')->nullable();
            $table->unsignedTinyInteger('genere_locatario')->nullable();
            $table->date('disponibilita_inizio');
            $table->date('disponibilita_fine');
            $table->unsignedInteger('posti_tot');
            $table->unsignedInteger('tipologia');
            $table->unsignedInteger('sup_appartamento')->nullable();
            $table->unsignedInteger('num_camere')->nullable();
            $table->boolean('cucina');
            $table->boolean('locale_ricreativo');
            $table->boolean('climatizzazione');
            $table->boolean('parcheggi');
            $table->boolean('farmacia');
            $table->boolean('supermercato');
            $table->boolean('ristorazione');
            $table->boolean('trasporti');
            $table->unsignedInteger('sup_camera')->nullable();
            $table->unsignedInteger('posti_camera')->nullable();
            $table->boolean('angolo_studio')->nullable();
            $table->boolean('opzionabilita');
            $table->date('data_inserimento');
            $table->date('data_assegnazione')->nullable();
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
