<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\Hovercraft;

class HovercraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed 10 Hovercrafts
        Hovercraft::factory(10)->create();

        // Fetch all crew IDs
        $crewIds = Crew::all()->pluck('id');

        // Assign 6 hovercrafts to different crews
        foreach ($crewIds as $index => $crewId) {
            Hovercraft::skip($index)->first()->update(['crew_id' => $crewId]);
        }
    }
}
