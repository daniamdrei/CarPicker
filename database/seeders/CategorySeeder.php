<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $now = Carbon::now();

        DB::table('categories')->insert([
            [
                'name' => 'سيارات اقتصادية',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'سيارات كهربائية',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'سيارات فارهة',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'باصات ووسائل نقل مشترك',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
