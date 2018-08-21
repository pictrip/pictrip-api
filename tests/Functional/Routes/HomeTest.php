<?php

namespace Tests\Functional\Routes;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * @test
     */
    public function register()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertJsonStructure(['message']);
    }
}