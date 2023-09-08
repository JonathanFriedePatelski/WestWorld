<?php

namespace Database\Seeders;

use App\Models\VisitorStatistic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VisitorStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisitorStatistic::upsert(
            File::json(database_path('datasets/visitor_data.json')),
            'date'
        );
    }
}
