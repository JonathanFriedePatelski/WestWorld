<?php

namespace Database\Factories;

use App\Models\Crew;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crew::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'call_sign' => $this->faker->unique()->word,
            // 'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
