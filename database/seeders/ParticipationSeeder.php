<?php

namespace Database\Seeders;

use App\Models\Participation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Participation::create([
            'participation_name' => 'Buyer'
        ]);
        Participation::create([
            'participation_name' => 'Exhibitor'
        ]);
        Participation::create([
            'participation_name' => 'Visitor'
        ]);
    }
}
