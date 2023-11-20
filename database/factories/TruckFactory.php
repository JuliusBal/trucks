<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    protected $model = Truck::class;

    public function definition(): array
    {
        return [
            'unit_number' => fake()->randomLetter() . fake()->randomNumber(4),
            'year'        => date('Y', strtotime(fake()->numberBetween(1900, (int)date('Y') + 5))),
            'notes'       => fake()->sentence
        ];
    }
}
