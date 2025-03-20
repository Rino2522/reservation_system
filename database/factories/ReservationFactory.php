<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'number_of_guests' => $this->faker->numberBetween(1, 8),
            'date' => $this->faker->dateBetween('+1 days', '+1 month'),
            'time' => $this->faker->time(),
            'meal_type' => $this->faker->randomElement(['コース', 'アラカルト']),
        ];
    }
}

