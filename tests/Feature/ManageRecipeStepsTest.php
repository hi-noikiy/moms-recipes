<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddEditStepTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }

    /** @test */
    public function authorized_user_can_add_step_to_their_recipe()
    {
        $this->signIn($this->user);

        $step = make('App\Step');
        $recipe = create('App\Recipe');
        $this->user->recipes()->save($recipe);

        $this->post($recipe->path() . '/steps', $step->toArray());

        $this->get($recipe->path())
            ->assertSee($step->body);
    }

    /** @test */
    public function unauthorized_user_can_not_add_step_to_other_recipe()
    {
        $this->withExceptionHandling();

        $step = make('App\Step');
        $recipe = create('App\Recipe');

        $this->post($recipe->path() . '/steps', $step->toArray())->assertRedirect('/login');
        $this->signIn();
        $this->post($recipe->path() . '/steps', $step->toArray())->assertStatus(403);
    }

    /** @test */
    public function a_guest_cannot_add_a_step_to_a_recipe()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $step = make('App\Step');
        $recipe = create('App\Recipe');

        $this->user->recipes()->save($recipe);

        $this->post($recipe->path() . '/steps', $step->toArray());
    }
}
