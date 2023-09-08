<?php

namespace Database\Seeders;

use App\Models\PointOfInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PointOfInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PointOfInterest::upsert(
            File::json(database_path('datasets/points_of_interest.json')),
            ['lattitude', 'longitude'],
        );
    }
}
