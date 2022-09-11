<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_time'      => Carbon::now()->addDays(rand(1, 30)),
            'session_status' => $this->faker->paragraph,
            'session_status' => $this->faker->randomElement(['pending', 'attended', 'not_attended']),
            'payment_status' => $this->faker->randomElement(['paid', 'not_paid']),
            'patient_id'     => rand(1, 4),
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
