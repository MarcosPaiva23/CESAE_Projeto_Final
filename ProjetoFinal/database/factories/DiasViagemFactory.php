<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiasViagem>
 */
class DiasViagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $user_id = 1;

        return [
            'user_id' => $user_id++,
            'segunda' => $this->faker->boolean,
            'terca' => $this->faker->boolean,
            'quarta' => $this->faker->boolean,
            'quinta' => $this->faker->boolean,
            'sexta' => $this->faker->boolean,
        ];
    }
}
