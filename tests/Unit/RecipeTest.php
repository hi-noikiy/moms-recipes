<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecipeTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();

        $this->recipe = factory('App\Recipe')->create();
        $this->user = factory('App\User')->create();
        $this->ingredients = factory('App\Ingredient', 5)->create();
        $this->ingredients->each( function($i) {
            $this->recipe->ingredients()->attach([
                $i->id => ['quantity' => 1, 'unit' => 'tsp']
            ]);
        });
    }

    /** @test */
    public function it_has_a_user()
    {
        $this->assertInstanceOf('App\User', $this->recipe->owner);
    }

    /** @test */
    public function it_has_an_ingredient() {
        $ingredient = $this->recipe->ingredients->first();
        $this->assertInstanceOf('App\Ingredient', $ingredient);
        $this->assertEquals(1, $ingredient->pivot->quantity);
        $this->assertEquals('tsp', $ingredient->pivot->unit);
    }
}