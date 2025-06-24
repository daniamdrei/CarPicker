<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
   // 🖼️ روابط صور جاهزة من الإنترنت (مجانية ومفتوحة المصدر)
        $sampleImages = [
            'https://cdn.pixabay.com/photo/2018/03/07/02/46/toyota-3204056_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/04/18/19/15/tesla-6187985_960_720.jpg',
            'https://cdn.pixabay.com/photo/2020/01/25/11/03/hyundai-elantra-4792219_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/02/10/20/34/tesla-6002337_960_720.jpg',
            'https://cdn.pixabay.com/photo/2016/10/11/14/55/audi-1734019_960_720.jpg',
        ];

        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->warn('🚫 No cars found. Run CarSeeder first.');
            return;
        }

        foreach ($cars as $car) {
            for ($i = 0; $i < 2; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $sampleImages[array_rand($sampleImages)], // ✅ رابط إنترنت مباشر
                    'position' => $i + 1,
                ]);
            }
        }

        $this->command->info('✅ Car images seeded using online image URLs.');
    }
}
