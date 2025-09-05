<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'city_name' => 'Taguig City',
            'city_code' => 3316,
        ]);

        City::create([
            'city_name' => 'Marikina City',
            'city_code' => 3316,
        ]);
    }
}
