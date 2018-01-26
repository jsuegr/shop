<?php

use Faker\Generator as Faker;
use App\Address;
$factory->define(Address::class, function (Faker $faker) {
    return [
        //
        'calle'=> $faker->streetName(),
        'no_exterior'=> $faker->buildingNumber(),
        'no_interior'=> $faker->buildingNumber(),
        'entre_calles'=> $faker->streetName(),
        'referencias'=> $faker->cityPrefix(),
        'codigo_postal'=> $faker->postcode(),
        'colonia'=> $faker->city(),
        'municipio'=> $faker->city(),
        'estado'=> $faker->state(),
        'user_id' => $faker->numberBetween(1,3)
    ];
});
