<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_qisa_bolyapti(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', ['email' => $user->email, 'password' => 'password']);

        $response->assertStatus(200)
            ->assertJson([
                'data' => true,
                'success' => true,
                'status' => true,
            ]);
        $response->assertJsonStructure([
            'data' => [
                'token'
            ]
        ]);
    }

    public function test_tizimga_kirgan_userni_olib_kelsa_bolyapti(): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $response = $this->get('/api/user');

        $response->assertOk()
            ->assertJson([
                'data' => true
            ]);
        $this->assertAuthenticatedAs($user);
    }
}
