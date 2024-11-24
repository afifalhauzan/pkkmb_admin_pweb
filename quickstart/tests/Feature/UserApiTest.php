<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;  // Ensures a clean database for each test

    /** @test */
    public function it_returns_users()
    {
        // Create a user in the database for testing
        User::factory()->create([
            'nim' => '123456789',
            'name' => 'John Doe',
            'prodi' => 'Computer Science',
            'role' => 'student',
        ]);

        // Send a GET request to the /api/users endpoint
        $response = $this->getJson('/api/users');

        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the user data
        $response->assertJsonFragment([
            'nim' => '123456789',
            'name' => 'John Doe',
            'prodi' => 'Computer Science',
            'role' => 'student',
        ]);
    }
}
