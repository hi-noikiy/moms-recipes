<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder {

    public function run()
    {
        factory('App\Ingredient', 25)->create();
    }
}
