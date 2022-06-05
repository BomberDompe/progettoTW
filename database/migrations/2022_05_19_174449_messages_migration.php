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
            $table->unsignedBigInteger('mittente_id')->index();
            $table->foreign('mittente_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('destinatario_id')->index();
            $table->foreign('destinatario_id')->references('id')->on('users')->onDelete('cascade');
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
