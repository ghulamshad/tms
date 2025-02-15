<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class TranslationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_can_create_translation()
    {
        // Create a user
        $user = User::factory()->create();

        // Generate Passport token
        $token = $user->createToken('test-token')->accessToken;

        // Make an authenticated request
        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
            'Accept' => 'application/json',
        ])->postJson('/api/translations', [
            'key' => 'greeting',
            'value' => 'Hello',
            'locale' => 'en',
            'tags' => 'common'
        ]);

        // Expect 201 Created status
        $response->assertStatus(201)->assertJson(['key' => 'greeting']);
    
        
    }
}
