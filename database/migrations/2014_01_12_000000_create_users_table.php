<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        //tabla de roles de usuario
        Schema::create('user_rols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable(); 
            $table->string('photo')->nullable();           
            $table->timestamps();
        });


        //tabla de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('username'); // login
            $table->string('photo')->nullable(); 
            $table->integer('status')->default(1); // habilitado-deshabilitado

            //FK
            $table->integer('userrol_id')->unsigned()->index()->nullable();
            $table->foreign('userrol_id')->references('id')->on('user_rols');

            
            
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
        Schema::dropIfExists('users');

        Schema::dropIfExists('user_rols');
    }
}
