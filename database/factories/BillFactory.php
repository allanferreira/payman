<?php

use Faker\Generator as Faker;

$factory->define(App\Bill::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat(2, 0, 20),
        'month' => $faker->month('now'),
        'year'  => $faker->year('now')
    ];
});
