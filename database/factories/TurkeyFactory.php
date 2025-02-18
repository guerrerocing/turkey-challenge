<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turkey>
 */
class TurkeyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->firstName(),
            'age' => $this->faker->numberBetween(1, 10),
            'color' => $this->faker->safeColorName(),
            'weight' => $this->faker->randomFloat(2, 5, 15),
            'mood' => $this->faker->randomElement(['Happy', 'Angry', 'Sleepy', 'Excited']),
           ];
    }
}
