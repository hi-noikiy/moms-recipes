<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Auth\AuthenticationException;

class AddEditIngredientTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp() {
        parent::setUp();

        $this->user = factory('App\User')->create();
    }

    /** @test */
    public function an_authenticated_user_can_add_ingredient_to_their_recipe() {
        $this->be($this->user);

        $ingredient = factory('App\Ingredient')->create();

        $recipe = factory('App\Recipe')->create();
        $this->user->recipes()->save($recipe);

        $this->post($recipe->path() . '/ingredients', ['id' => $ingredient->id, 'quantity' => 99, 'unit' => 'C', 'notes' => 'zzz']);

        $this->get($recipe->path())
            ->assertSee($ingredient->name);
    }

    /** @test */
    public function an_authenticated_user_can_not_add_ingredient_to_other_recipe() {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');
        $ingredient = factory('App\Ingredient')->create();

        $recipe = factory('App\Recipe')->create();
        $this->user->recipes()->save($recipe);

        $this->be(factory('App\User')->create());
        $this->post($recipe->path() . '/ingredients', ['id' => $ingredient->id, 'quantity' => 99, 'unit' => 'C', 'notes' => 'zzz']);

        $this->get($recipe->path())
            ->assertSee($ingredient->name);
    }
}
