<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_feautures');
        Schema::dropIfExists('products');
         

         

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('descripcion')->nullable();
            $table->text('long_description')->nullable();
            

            
            
             //FK
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
        });

        //product 
         Schema::create('product_feautures', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->integer('stock');
            $table->string('color')->nullable();
            $table->string('size');
            $table->unique(['color', 'size']);
            //FK
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
             

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
        Schema::dropIfExists('products');
    }
}
