<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post(route('login'), [
            'username' => 'alex.ciarlillo@gmail.com',
            'password' => 'password',
            'grant_type' => 'password'
        ]);

        $response = $this->get('/api/logout');
        dd($response);
    }
}
