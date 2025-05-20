<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Todo::factory()->create([
            'title' => "Manger",
            "isDone" => false
        ]);

        Todo::factory()->create([
            'title' => "Boire",
            "isDone" => false
        ]);

        Todo::factory()->create([
            'title' => "Dormir",
            "isDone" => false
        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
