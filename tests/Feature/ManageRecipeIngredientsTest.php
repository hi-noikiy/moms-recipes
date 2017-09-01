<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddEditIngredientTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function authorized_user_can_add_ingredient_to_their_recipe()
    {
        $this->signIn();

        $ingredient = create('App\Ingredient');
        $recipe = make('App\Recipe');
        Auth::user()->recipes()->save($recipe);

        $this->post($recipe->path() . '/ingredients', ['id' => $ingredient->id, 'quantity' => 99, 'unit' => 'C', 'notes' => 'zzz']);

        $this->get($recipe->path())
            ->assertSee($ingredient->name);
    }

    /** @test */
    public function unauthorized_user_cannot_add_ingredient_to_recipe()
    {
        $this->withExceptionHandling();

        $ingredient = create('App\Ingredient');
        $recipe = create('App\Recipe');
        $recipeIngredient = ['id' => $ingredient->id, 'quantity' => 99, 'unit' => 'C', 'notes' => 'zzz'];

        $this->post($recipe->path() . '/ingredients', $recipeIngredient)->assertRedirect('/login');
        $this->signIn();
        $this->post($recipe->path() . '/ingredients', $recipeIngredient)->assertStatus(403);
    }
}
