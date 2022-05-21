<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->string('username_id', 20)->index();
            $table->string('password', 20);
            $table->string('nome', 20);
            $table->string('cognome', 20);
            $table->unsignedTinyInteger('genere');
            $table->string('data_nascita', 20);
            $table->string('comune_residenza', 25);
            $table->string('telefono', 10);
            $table->unsignedTinyInteger('tipologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti');
    }
}
