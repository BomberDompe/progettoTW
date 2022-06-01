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
            $table->string('locatore_id')->index();
            $table->foreign('locatore_id')->references('username')->on('users');
            $table->string('locatario_id')->index();
            $table->foreign('locatario_id')->references('username')->on('users');
            $table->bigInteger('offerta_id')->unsigned()->index();
            $table->foreign('offerta_id')->references('offerta_id')->on('offerte');
            $table->string('contenuto', 1000);
            $table->timestamp('timestamp');
            $table->boolean('visualizzato');
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
