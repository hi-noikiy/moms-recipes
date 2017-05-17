<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddEditRecipeTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp() {
        parent::setUp();

        $this->user = factory('App\User')->create();
    }

    /** @test */
    public function an_authenticated_user_can_add_a_recipe() {
        $this->be($this->user);

        $recipe = factory('App\Recipe')->make();

        $this->post('/recipes', $recipe->toArray());

        $this->get($recipe->path())
                ->assertSee($recipe->title);
    }

    /** @test */
    public function an_authenticated_user_can_add_ingredient_to_recipe() {
        $this->be($this->user);

        $ingredient = factory('App\Ingredient')->make();

        $recipe = factory('App\Recipe')->create();
        $this->user->recipes()->save($recipe);

        $this->post($recipe->path(), $ingredient->toArray());

        $this->get($recipe->path())
            ->assertSee($ingredient->name);
    }
}
