<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\User;

class UserCrewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 crews without user_ids
        $crews = Crew::all();

        // Create 60 users without crew_ids
        $users = User::all();

        // Distribute the 60 users across the 10 crews
        $users->each(function ($user, $index) use ($crews) {
            $crewIndex = intdiv($index, 6);  // This will be 0 for the first 6 users, 1 for the next 6, etc.
            $user->update(['crew_id' => $crews[$crewIndex]->id]);
        });
    }
}
