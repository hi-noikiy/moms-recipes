<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get('database/data/ingredients_raw.json');
        $data = json_decode($json);

        foreach ($data as $name) {
            Ingredient::create(['name' => $name]);
        }
    }
}
