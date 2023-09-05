<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path('data/points_of_interest.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('locations')->insert([
                'title' => $item['title'],
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'description' => $item['description'],
                'type' => $item['type'],
                'narrative_level' => $item['narrative_level'],
            ]);
        }
    }
}
