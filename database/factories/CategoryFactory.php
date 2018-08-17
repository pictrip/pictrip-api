<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'foursquare_id' => str_random(),
        'name' => $faker->name,
        'pluralName' => $faker->name,
        'shortName' => $faker->name,
        'icon' => str_random(5),
    ];
});
