<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
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
            'user_email' => 'teste@gmail.com',
            'comentario' => 'teste',
            'assunto' => 'assunto',

            //
        ];
    }
}


