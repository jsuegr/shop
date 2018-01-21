<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeauturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feautures', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->integer('stock');
            $table->string('color')->nullable();
            $table->string('size');
            $table->unique(['color', 'size']);
            
             

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
        Schema::dropIfExists('product_feautures');
    }
}
