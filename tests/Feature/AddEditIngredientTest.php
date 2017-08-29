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

        $this->user = create('App\User');
    }

    /** @test */
    public function an_authenticated_user_can_add_ingredient_to_their_recipe() {
        $this->signIn($this->user);

        $ingredient = create('App\Ingredient');

        $recipe = create('App\Recipe');
        $this->user->recipes()->save($recipe);

        $this->post($recipe->path() . '/ingredients', ['id' => $ingredient->id, 'quantity' => 99, 'unit' => 'C', 'notes' => 'zzz']);

        $this->get($recipe->path())
            ->assertSee($ingredient->name);
    }

    /** @test */
    public function an_authenticated_user_can_not_add_ingredient_to_other_recipe() {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');
        $ingredient = create('App\Ingredient');

        $recipe = create('App\Recipe');
        $this->user->recipes()->save($recipe);

        $this->be(create('App\User'));
        $this->post($recipe->path() . '/ingredients', []);
    }
}
