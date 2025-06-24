<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarCapability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CarCapabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $faker = Faker::create();

        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->warn('🚫 No cars found. Run CarSeeder first.');
            return;
        }

        foreach ($cars as $car) {
            CarCapability::create([
                'car_id' => $car->id,
                'performance' => $faker->randomElement(['قوي', 'متوسط', 'ضعيف']),
                'fuel_consumption' => $faker->randomFloat(1, 4, 12) . ' لتر/100كم',
                'acceleration' => $faker->randomFloat(1, 3.5, 10) . ' ثانية / 0-100كم',
                'other_details' => $faker->sentence(8),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ Car capabilities seeded.');
    }
}
