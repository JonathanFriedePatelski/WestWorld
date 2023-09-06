<?php

namespace Database\Seeders;

use App\Models\Crew;
use Illuminate\Database\Seeder;

class CrewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Crew::factory(10)->create();
    }
}
