<?php

use Faker\Generator as Faker;

$factory->define(App\Ingredient::class, function ($faker) {
    return [
        'name' => "$faker->colorName $faker->word"
    ];
});
