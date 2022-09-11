<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SessionDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session_notes'  => $this->faker->paragraph,
            'accept'         => rand(0,1),
            'marital_status' => $this->faker->randomElement(['public', 'private']),
            'session_id'     => rand(1, 88),
            'created_at'     => now(),
            'updated_at'     => now(),
            'posted_at'      => now(),
        ];
    }
}
