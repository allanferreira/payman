<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'value' => $faker->randomFloat(2, 0, 20),
    ];
});
