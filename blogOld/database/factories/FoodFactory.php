<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category' => $faker->name,
        'description'=>$faker->name,
        'price' =>10,
    ];
});
