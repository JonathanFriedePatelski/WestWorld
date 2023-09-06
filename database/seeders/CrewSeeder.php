<?php

namespace Database\Seeders;

use App\Models\Crew;
use Illuminate\Database\Seeder;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $callSigns = [
            'Tidy Titans',
            'Dirt Demolishers',
            'Trash Terminators',
            'Spotless Spartans',
            'Sanitation Samurai',
            'Dust Devils',
            'Muck Masters',
            'Hygiene Heroes',
            'Janitorial Juggernauts',
            'Shine Shinobi',
        ];

        Crew::factory(10)
            ->sequence(function () use (&$callSigns) {
                return ['call_sign' => array_pop($callSigns)];
            })
            ->create();
    }
}
