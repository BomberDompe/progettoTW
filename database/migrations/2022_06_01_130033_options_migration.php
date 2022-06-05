<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OptionsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opzionamenti', function (Blueprint $table) {
            $table->bigIncrements('opzionamento_id')->unsigned()->index();
            $table->unsignedBigInteger('locatario_id')->index();
            $table->foreign('locatario_id')->references('id')->on('users');
            $table->bigInteger('offerta_id')->unsigned()->index();
            $table->foreign('offerta_id')->references('offerta_id')->on('offerte');
            $table->date('data_opzionamento');
            $table->date('data_assegnamento')->nullable();
            $table->string('documento', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
