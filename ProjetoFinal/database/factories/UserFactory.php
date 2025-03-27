<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Array com 10 a 20 strings predefinidas para o campo 'morada'
        $cords = [
            '-8.62373892891061,41.20984642602976',
            '-8.69197159496513,41.20605866859974',
            '-8.662925040391382,41.16204846139344',
            '-8.672150142051494,41.15637282772942',
            '-8.50890635067401,41.11749296683295',
            '-8.53030302605797,41.39062555346672',
            '-8.629639586798993,41.11151807013264',
            '-8.630842425420784,41.13199405920862',
            '-8.609259968851715,41.11378678203379',
            '-8.636514712016412,41.12695312387418',
            '-8.510626580905566,41.11508860762943',
            '-8.538368981462947,41.14183613573189',
            '-8.55736242974094,41.17622665012679',
            '-8.54981060982447,41.17771218940574',
        ];

        // Array com 10 a 20 strings predefinidas para o campo 'morada'
        $curses = [
            'Software Development',
            'Data analysis',
            'UI/UX Design',
            'Cybersecurity',
            'Networking',
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->username(). '@msft.cesae.pt',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('pass'),
            'remember_token' => Str::random(10),
            'curso' => $this->faker->randomElement($curses),
            'data_conclusao' => Carbon::now()->addMonths(3),
            'horario' => rand(0,1),
            'tem_carro' => rand(0,1),
            'morada' => $this->faker->randomElement($cords),
            'foto' => "teste.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    /*
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
        */
}
