<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorStatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path('data/visitor_data.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('visitor_statistics')->insert([
                'date' => Carbon::parse($item['Date'])->toDateTimeString(),
                'total_visitors' => $item['Total_Visitors'],
                'male_visitors' => $item['Male_Visitors'],
                'female_visitors' => $item['Female_Visitors'],
            ]);
        }
    }
}
