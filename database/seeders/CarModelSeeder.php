<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car_models')->insert([
        ['name' => 'Corolla', 'descriptions' => 'Popular sedan'],
        ['name' => 'Model 3', 'descriptions' => 'Electric sedan'],
        ['name' => 'E-Class', 'descriptions' => 'Luxury sedan'],
]);

    }
}
