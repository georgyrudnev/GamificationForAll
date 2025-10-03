<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'id' => '12',
            'name' => 'Anonymous',
            'email' => 'anonymous@example.com',
        ]);
        \App\Models\User::factory(10)->create([]);
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(3)->create();
    }
}
