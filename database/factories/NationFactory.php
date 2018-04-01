<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User\Nation::class, function (Faker $faker) {
    return [
        'name'        => $faker->country,
        'description' => $faker->sentence,
    ];
});
