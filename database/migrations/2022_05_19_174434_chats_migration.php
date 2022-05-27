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
            $table->bigIncrements('conversazione_id')->unsigned()->index();
            $table->string('locatore_id')->index();
            $table->foreign('locatore_id')->references('username')->on('users');
            $table->string('locatario_id')->index();
            $table->foreign('locatario_id')->references('username')->on('users');
            $table->bigInteger('offerta_id')->unsigned()->index();
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
