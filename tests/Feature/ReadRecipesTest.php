<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadRecipesTest extends TestCase
{
    use DatabaseMigrations;

    protected $recipe;

    public function setUp() {
        parent::setUp();

        $user = factory('App\User')->create();
        $ingredients = factory('App\Ingredient', 5)->create();

        $this->recipe = factory('App\Recipe')->create();

        $ingredients->each( function($i) {
            $this->recipe->ingredients()->attach([
                $i->id => ['quantity' => 1, 'unit' => 'tsp', 'notes' => '']
            ]);
        });
    }

    /** @test */
    public function a_user_can_browse_recipes()
    {
        $response = $this->get('/recipes');

        $response->assertSee($this->recipe->title);
    }

    /** @test */
    public function a_user_can_view_a_recipe()
    {
        $response = $this->get('/recipes/' . $this->recipe->id);

        $response->assertSee($this->recipe->title);
    }

    /** @test */
    public function a_user_can_see_ingredients_associated_with_a_recipe()
    {
        $response = $this->get('/recipes/' . $this->recipe->id);

        $response->assertSee($this->recipe->ingredients()->first()->name);
    }
}
