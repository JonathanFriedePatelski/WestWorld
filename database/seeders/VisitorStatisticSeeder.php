<?php

namespace Database\Seeders;

use App\Models\VisitorStatistic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VisitorStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisitorStatistic::upsert(Storage::json('data/visitor_data.json'), 'date');
    }
}
