<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Car;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();
        $cars = Car::all();
        $users = User::all();

        if ($cars->isEmpty() || $users->isEmpty()) {
            $this->command->warn('🚫 No cars or users found. Run CarSeeder & UserSeeder first.');
            return;
        }

        foreach ($cars as $car) {
            for ($i = 0; $i < 3; $i++) {
                Review::create([
                    'user_id' => $users->random()->id,
                    'car_id' => $car->id,
                    'review_type' => $faker->randomElement(['تجربة عامة', 'مقتني سابق', 'تجربة قيادة']),
                    'fuel_consumption' => $faker->numberBetween(1, 5),
                    'acceleration' => $faker->numberBetween(1, 5),
                    'interior_space' => $faker->numberBetween(1, 5),
                    'exterior_design' => $faker->numberBetween(1, 5),
                    'features' => $faker->numberBetween(1, 5),
                    'review_text' => $faker->paragraph,
                    'estimated_price' => $faker->numberBetween(15000, 70000),
                    'status' => 'pending', // أو 'approved' حسب نظامك
                    'created_at' => now(),
                ]);
            }
        }

        $this->command->info('✅ Reviews seeded successfully.');
    }
}
