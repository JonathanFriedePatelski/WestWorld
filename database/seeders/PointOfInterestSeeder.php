<?php

namespace Database\Seeders;

use App\Models\PointOfInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PointOfInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PointOfInterest::upsert(Storage::json('data/points_of_interest.json'), ['latitude', 'longitude']);
    }
}
