<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContractsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratti', function (Blueprint $table) {
            $table->bigIncrements('contratto_id')->unsigned()->index();
            $table->foreign('locatore_id')->references('username_id')->on('utenti');
            $table->string('documento', 100);
            $table->date('data_stipulazione');
            $table->unsignedTinyInteger('tipologia_offerta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratti');
    }
}
