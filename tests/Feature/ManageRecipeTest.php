<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddEditRecipeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function authenticated_user_can_add_a_recipe()
    {
        $this->signIn();

        $recipe = make('App\Recipe');
        $this->post('/recipes', $recipe->toArray());

        $this->get($recipe->path())
                ->assertSee($recipe->title);
    }

    /** @test */
    public function guest_cannot_add_a_recipe()
    {
        $this->withExceptionHandling();

        $this->post('/recipes', [])->assertRedirect('/login');
    }
}
