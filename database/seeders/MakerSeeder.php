<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('makers')->insert([
        ['name' => 'Toyota', 'descriptions' => 'Japanese maker'],
        ['name' => 'Tesla', 'descriptions' => 'Electric cars innovator'],
        ['name' => 'Mercedes', 'descriptions' => 'German luxury brand'],
]);

    }
}
