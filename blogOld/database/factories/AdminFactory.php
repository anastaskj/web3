<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'password', // temporary in case we need to show admin rights remotely (no one is present in class)
        'remember_token' => str_random(10),
    ];
});
