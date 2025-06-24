<?php

namespace Database\Factories;

use App\Models\CarModel;
use App\Models\Category;
use App\Models\Maker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'maker_id' => Maker::inRandomOrder()->first()->id,
        'car_model_id' => CarModel::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'name' => $this->faker->word . ' ' . $this->faker->randomElement(['X', 'Pro', 'Elite']),
        'year' => $this->faker->numberBetween(2018, 2024),
        'avg_price' => $this->faker->numberBetween(15000, 80000),
        'basic_spec' => $this->faker->sentence(8),
        'created_at' => now(),
        'updated_at' => now()
        ];
    }
}
