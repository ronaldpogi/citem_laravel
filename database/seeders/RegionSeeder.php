<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            'region_name' => 'NCR',
            'region_code' => 3316,
        ]);

        Region::create([
            'region_name' => 'CAR',
            'region_code' => 3316,
        ]);
    }
}
