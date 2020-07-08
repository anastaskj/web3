<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => 1,
        'completed' => 1,
        'total_price'=> 20,
    ];
});

