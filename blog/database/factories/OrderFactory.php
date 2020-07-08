<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween($min = 1, $max = 2),
        'completed' => $faker->numberBetween($min = 0, $max = 1),
        'total_price'=>  $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
    ];
});

