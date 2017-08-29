<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Auth\AuthenticationException;

class AddEditStepTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp() {
        parent::setUp();

        $this->user = create('App\User');
    }

    /** @test */
    public function an_authenticated_user_can_add_step_to_their_recipe() {
        $this->be($this->user);

        $step = make('App\Step');
        $recipe = create('App\Recipe');
        $this->user->recipes()->save($recipe);

        $this->post($recipe->path() . '/steps', $step->toArray());

        $this->get($recipe->path())
            ->assertSee($step->body);
    }

    /** @test */
    public function an_authenticated_user_can_not_add_step_to_other_recipe() {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');
        $step = make('App\Step');

        $recipe = create('App\Recipe');
        $this->user->recipes()->save($recipe);

        $this->be(create('App\User'));
        $this->post($recipe->path() . '/steps', []);
    }
}
