<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'post_id' => rand(1, 20),
        'rating' => rand(1,10),
    ];
});
