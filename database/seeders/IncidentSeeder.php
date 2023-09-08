<?php

namespace Database\Seeders;

use App\Models\Incident;
use App\Models\PointOfInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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
        $allIncidents = File::json(database_path('datasets/incident_reports.json'));

        foreach (array_chunk($allIncidents, 1000) as $incidentChunk) {
            $newIncidents = [];
            foreach ($incidentChunk as $incident) {
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
}
