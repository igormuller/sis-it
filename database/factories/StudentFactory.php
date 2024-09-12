<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serie>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enroll' => random_int(11111,999999),
            'name' => fake()->name(),
            'birthday' => fake()->date(),
            // 'segment' => fake()->name(),
            'fathers_name' => fake()->name(),
            'mothers_name' => fake()->name(),
        ];
    }
}
