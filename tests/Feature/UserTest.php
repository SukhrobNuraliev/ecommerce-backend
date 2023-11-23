<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
    }


    /**
     * A basic feature test example.
     */
    public function test_barcha_userlarni_olib_kesa_bolyapti(): void
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => true,
        ]);
    }
}
