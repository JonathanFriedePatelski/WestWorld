<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path('data/incident_reports.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('incidents')->insert([
                'incident_id' => $item['incident_id'],
                'timestamp' => Carbon::parse($item['timestamp'], 'Europe/Amsterdam'),
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'type' => $item['type'],
                'severity' => $item['severity'],
                'point_of_interest' => $item['point_of_interest'],
            ]);
        }
    }
}
