<?php

use Faker\Generator as Faker;
use App\Product;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Product::class, function (Faker $faker) {
	$size=["chico","mediano","grande"];
    return[
       	'name' => substr($faker->sentence(3), 0, -1),
        'descripcion' => $faker->sentence(10),
        'long_description' => $faker->text ,
        'price' => $faker->randomFloat(2,5,150),
        'stock' => $faker->numberBetween(50,200),
        'color' => $faker->colorName(),
        'size' => $size[rand(0,2)],
        'category_id' => $faker->numberBetween(1,5)
    ];
});
