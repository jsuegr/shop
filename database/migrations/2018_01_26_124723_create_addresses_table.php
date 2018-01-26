<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle');
            $table->string('no_exterior')->nullable();
            $table->string('no_interior');
            $table->string('entre_calles')->nullable();
            $table->string('referencias')->nullable();
            $table->string('codigo_postal');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('estado');

            //FK User
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('addresses');
    }
}
