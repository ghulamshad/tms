<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Translation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Prevent duplicate email error
        User::firstOrCreate(
            ['email' => 'test@example.com'], // Condition to check
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Add password
            ]
        );

        // Generate random users
        User::factory(10)->create();
        // Seed 100,000 translation records for performance testing
        Translation::factory(100000)->create();
    }
}
