<?php

namespace Database\Seeders;

use App\Models\Incident;
use App\Models\PointOfInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poiIds = PointOfInterest::pluck('id', 'title')->all();

        foreach (Storage::json('data/incident_reports.json') as $incident) {
            $newIncidents[] = [
                'point_of_interest_id' => $poiIds[$incident['point_of_interest']],
                'occurred_at' => $incident['timestamp'],
                'latitude' => $incident['latitude'],
                'longitude' => $incident['longitude'],
                'type' => $incident['type'],
                'severity' => $incident['severity'],
            ];
        }

        Incident::upsert($newIncidents, ['latitude', 'longitude']);
    }
}
