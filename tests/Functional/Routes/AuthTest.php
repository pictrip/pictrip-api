<?php

namespace Tests\Functional\Routes;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function register()
    {
        $this->artisan('passport:install', ['--no-interaction' => true]);

        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => 'email@local.host',
            'password' => '123456',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'email' => 'email@local.host',
        ]);

        $response->assertJsonStructure([
            'data' => [
                'id', 'name', 'email', 'token'
            ]
        ]);

        $response->assertJsonFragment([
            'id' => 1,
            'name' => 'Test',
            'email' => 'email@local.host',
        ]);
    }

    /**
     * @test
     */
    public function login()
    {
        $this->artisan('passport:install', ['--no-interaction' => true]);

        $user = factory(User::class)->create(['password' => bcrypt('123456')]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        $this->assertTrue($response->isOk());

        $response->assertJsonStructure([
            'data' => [
                'id', 'name', 'email', 'token'
            ]
        ]);

        $response->assertJsonFragment([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    /**
     * @test
     */
    public function getUser()
    {
        $this->artisan('passport:install', ['--no-interaction' => true]);

        $user = factory(User::class)->create(['password' => bcrypt('123456')]);
        $token = $user->createToken('App')->accessToken;

        $response = $this->get('/user', [
            'Authorization' => 'Bearer '.$token
        ]);
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => null,
            ]
        ]);
    }
}