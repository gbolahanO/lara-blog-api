<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'post_id' => random_int(1, 50),
        'name' => $faker->sentence(3, true),
        'email' => $faker->email,
        'text' => $faker->sentences(15, true)
    ];
});
