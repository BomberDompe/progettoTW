<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessagesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggi', function (Blueprint $table) {
            $table->bigIncrements('messaggio_id')->unsigned()->index();
            $table->bigInteger('conversazione_id')->unsigned()->index();
            $table->foreign('conversazione_id')->references('conversazione_id')->on('conversazioni');
            $table->string('contenuto', 1000);
            $table->timestamp('timestamp');
            $table->boolean('visualizzato');
            $table->boolean('inviato_locatore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggi');
    }
}
