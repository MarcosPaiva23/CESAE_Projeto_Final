<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Main Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('pass'),
            'is_admin' => 1,
            'curso' => 'admin',
            'data_conclusao' => now(),
            'horario' => 9,
            'tem_carro' => 9,
            'morada' => '0000,0000',
            'foto' => 'admin.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Blocked',
            'email' => 'blocked@blocked.com',
            'password' => Hash::make('pass'),
            'is_admin' => 0,
            'curso' => 'admin',
            'data_conclusao' => now(),
            'horario' => 9,
            'tem_carro' => 9,
            'morada' => '0000,0000',
            'foto' => 'admin.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
            'is_blocked' => 1,
        ]);
    }
}
