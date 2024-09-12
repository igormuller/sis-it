<?php

namespace Database\Factories;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serie>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->numberBetween(101, 500),
            'shift' => Arr::random(['MORNING', 'AFTERNOON', 'FULL_TIME']),
            'vacancies' => fake()->numberBetween(5,50),
            'school_year' => 2024,
            'serie_id' => Arr::random(Serie::all()->pluck('id')->toArray()),
        ];
    }
}
