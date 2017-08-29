<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Auth\AuthenticationException;

class AddEditRecipeTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp() {
        parent::setUp();

        $this->user = create('App\User');
    }

    /** @test */
    public function an_authenticated_user_can_add_a_recipe() {
        $this->be($this->user);

        $recipe = make('App\Recipe');
        $this->post('/recipes', $recipe->toArray());

        $this->get($recipe->path())
                ->assertSee($recipe->title);
    }

    /** @test */
    public function an_unauthenticated_user_can_not_add_a_recipe() {
        $this->expectException('\Illuminate\Auth\AuthenticationException');

        $this->post('/recipes', []);
    }
}
