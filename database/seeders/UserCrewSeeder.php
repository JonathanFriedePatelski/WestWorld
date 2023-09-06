<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\User;

class UserCrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crews = Crew::all();

        $users = User::all();

        $users->each(function ($user, $index) use ($crews) {
            $crewIndex = intdiv($index, 6);
            $user->update(['crew_id' => $crews[$crewIndex]->id]);
        });
    }
}
