<?php

use Faker\Generator as Faker;
use App\Category;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Category::class, function (Faker $faker) {
    return [
    	'name' => ucfirst($faker->word),
    	'description' => $faker->sentence(10) 
    ];
});
