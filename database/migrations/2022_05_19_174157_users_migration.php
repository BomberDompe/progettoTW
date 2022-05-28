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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 20)->index();
            $table->string('password', 191);
            $table->string('name', 20)->nullable();
            $table->string('surname', 20)->nullable();
            $table->string('genere', 10)->nullable();
            $table->string('data_nascita', 20)->nullable();
            $table->string('comune_residenza', 25)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('role', 10);
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();   
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
