<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'content' => $faker->text,
        'image_id' => 54,
        'user_id' => $faker->numberBetween(1, 3)
    ];
});
