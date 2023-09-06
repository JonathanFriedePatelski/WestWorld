<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\Hovercraft;
use Illuminate\Support\Facades\DB;

class HovercraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crewIds = Crew::pluck('id')->all();

        $newHovercrafts = Hovercraft::factory(10)
            ->raw(function () use (&$crewIds) {
                return ['crew_id' => array_pop($crewIds)];
            });

        Hovercraft::upsert($newHovercrafts, 'crew_id');
    }
}
