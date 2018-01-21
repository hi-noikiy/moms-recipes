<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Recipe::class, function ($faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'slug' => $faker->slug,
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        }
    ];
});
