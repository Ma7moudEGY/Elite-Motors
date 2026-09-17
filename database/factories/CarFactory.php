<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'make' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->numberBetween(2000, 2023),
            'color' => $this->faker->safeColorName(),
            'image' => $this->faker->imageUrl(640, 480, 'transport', true),
            'is_rented' => false,
            'rental_price' => $this->faker->randomFloat(2, 50, 500),
            'user_id' => 1,
        ];
    }
}
