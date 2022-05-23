<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversazioni', function (Blueprint $table) {
            $table->bigIncrements('conversazione_id', 20)->unsigned()->index();
            $table->foreign('locatore_id')->references('username_id')->on('utenti');
            $table->foreign('locatario_id')->references('username_id')->on('utenti');
            $table->foreign('offerta_id')->references('offerta_id')->on('offerte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversazioni');
    }
}
