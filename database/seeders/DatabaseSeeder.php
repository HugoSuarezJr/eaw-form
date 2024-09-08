<?php

namespace Database\Seeders;

use App\Models\Client;
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

        User::factory()->create([
            'name' => 'Hugo',
            'email' => 'Hugo@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => time()
        ]);

        User::factory()->create([
            'name' => 'Tony',
            'email' => 'tony@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => time()
        ]);

        Client::factory()
            ->count(10)
            ->create();
    }
}
