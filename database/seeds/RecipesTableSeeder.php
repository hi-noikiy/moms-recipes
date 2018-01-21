<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();

        // setup some test units
        $units = ['C', 'Tbsp', 'tsp', 'g', 'ml'];

        // use pre-seeded users and ingredients to attach to recipes
        $users = App\Models\User::pluck('id')->all();
        $ingredients = App\Models\Ingredient::pluck('id')->all();

        factory('App\Models\Recipe', 20)->create([ 'user_id' => $users[ rand(0, count($users))] ])
            ->each(function ($recipe) use ($faker, $ingredients, $units) {

                // choose random ingredients
                $ingredient_list = $faker->randomElements($ingredients, rand(1, 10));

                // attach them
                foreach($ingredient_list as $ingredient_id) {
                    $recipe->ingredients()->attach([$ingredient_id =>
                        [
                            'quantity' => $faker->randomDigit,
                            'unit' => $faker->randomElement($units),
                            'notes' => $faker->sentence
                        ]
                    ]);
                }

                // add some steps
                factory('App\Models\Step', 10)->create(['recipe_id' => $recipe->id]);
            });
    }
}
