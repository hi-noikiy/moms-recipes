<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        factory('App\User', 10)->create();
        factory('App\User')->create(['name' => 'Alex Ciarlillo', 'email' => 'alex.ciarlillo@gmail.com', 'password' => bcrypt('password')]);
    }
}
