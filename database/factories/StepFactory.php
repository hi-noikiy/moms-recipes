<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Step::class, function ($faker) {
    return [
        'body' => $faker->sentence
    ];
});
