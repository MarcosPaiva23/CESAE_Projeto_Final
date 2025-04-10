<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Feedback;
use App\Models\DiasViagem;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creation of main admin
        $this->call(UsersSeeder::class);

        // creation of the simulated users
        User::factory(100)->create();

        // creation of the simulated days
        DiasViagem::factory(102)->create();

        // creation of the feedback comments
        Feedback::factory(5)->create();

    }
}
