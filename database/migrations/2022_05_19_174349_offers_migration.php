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
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('titolo', 100);
            $table->string('descrizione', 2000);
            $table->float('prezzo');
            $table->string('immagine', 100)->nullable();
            $table->string('citta', 30);
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
            $table->boolean('cucina')->nullable();
            $table->boolean('locale_ricreativo')->nullable();
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
