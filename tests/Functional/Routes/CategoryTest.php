<?php

namespace Tests\Functional\Routes;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');
    }

    /**
     * @test
     */
    public function categoryPaginate()
    {
        factory(Category::class, 10)->create();

        $response = $this->get('/categories?limit=1');

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                ['id', 'name']
            ],
            'links' => [
                'first', 'last', 'prev', 'next'
            ],
            'meta' => [
                'current_page', 'from', 'last_page', 'path', 'per_page', 'to', 'total'
            ]
        ]);
        $response->assertJsonFragment([
            "current_page" => 1,
            "from" => 1,
            "last_page" => 10,
            "per_page" => 1,
            "to" => 1,
            "total" => 10,
        ]);
    }

    /**
     * @test
     */
    public function categorySearchByName()
    {
        factory(Category::class, 2)->create();
        $categories = factory(Category::class, 2)->create(['name' => 'beach']);

        $response = $this->get('/categories?name=beach');

        $response->assertOk();
        $response->assertJsonFragment([
            'data' => [
                [
                    'id' => $categories[0]->id,
                    'name' => $categories[0]->name,
                ],
                [
                    'id' => $categories[1]->id,
                    'name' => $categories[1]->name,
                ],
            ]
        ]);
    }
}