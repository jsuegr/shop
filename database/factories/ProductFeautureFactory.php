<?php

use Faker\Generator as Faker;
use App\ProductFeauture;
$factory->define(ProductFeauture::class, function (Faker $faker) {
    $size=["chico","mediano","grande"];
    return [
        //
    	'price' => $faker->randomFloat(2,5,150),
        'stock' => $faker->numberBetween(50,200),
        'color' => $faker->unique()->colorName(),
        'size' => $size[rand(0,2)],
        'product_id' => $faker->numberBetween(1,20)
    ];
});
