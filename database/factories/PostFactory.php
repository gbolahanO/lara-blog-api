<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Model::class, function (Faker $faker) {
    $title = $faker->sentence(6, true);
    return [
        'user_id' => 1,
        'category_id' => random_int(1, 3),
        'title' => $title,
        'slug' => Str::slug($title),
        'post_image' => $faker->imageUrl(640, 480),
        'content' => $faker->paragraph(40, true),
        'published' => true
    ];
});
