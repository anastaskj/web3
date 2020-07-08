<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'category' => 'Main course',
        'description'=>$faker->sentence($nbWords = 15, $variableNbWords = true),
        'price' =>$faker->randomDigitNotNull,
    ];
});
