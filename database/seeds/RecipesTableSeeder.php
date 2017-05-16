<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder {

    public function run()
    {
        $units = ['C', 'Tbsp', 'tsp', 'g', 'ml'];
        $users = App\User::pluck('id')->all();
        $ingredients = App\Ingredient::pluck('id')->all();

        $faker = Faker\Factory::create();

        factory('App\Recipe', 20)->create([ 'user_id' => $users[ rand(0, count($users))] ])
            ->each(function ($r) use ($faker, $ingredients, $units) {
                $ingredient_list = $faker->randomElements($ingredients, rand(1, 10));

                foreach($ingredient_list as $i) {
                    $r->ingredients()->attach([$i =>
                        ['quantity' => $faker->randomDigit,
                        'unit' => $faker->randomElement($units)]
                    ]);
                }
            });
    }
}
