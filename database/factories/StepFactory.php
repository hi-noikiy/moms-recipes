<?php

use Faker\Generator as Faker;

$factory->define(App\Step::class, function ($faker) {
    return [
        'body' => $faker->sentence
    ];
});
