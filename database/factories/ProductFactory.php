<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
	
    return[
       	'name' => substr($faker->sentence(3), 0, -1),
        'descripcion' => $faker->sentence(10),
        'long_description' => $faker->text ,        
        'category_id' => $faker->numberBetween(1,5),
        'user_id' => $faker->numberBetween(2,3)
        
    ];
});
