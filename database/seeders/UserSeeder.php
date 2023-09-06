<?php

namespace Database\Seeders;

use App\Models\Crew;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crewIds = Crew::pluck('id');

        $newUsers = User::factory(60)
            ->sequence(fn (Sequence $sequence) => ['crew_id' => $crewIds[intdiv($sequence->index, 6)]])
            ->raw();

        User::upsert($newUsers, 'email');
    }
}
