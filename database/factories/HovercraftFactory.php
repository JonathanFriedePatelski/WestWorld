<?php

namespace Database\Factories;

use App\Models\Hovercraft;
use App\Models\Crew;
use App\Enums\HoverCraftEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class HovercraftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hovercraft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'crew_id' => null, // This will be set in the seeder
            'fuel_level' => $this->faker->numberBetween(0, 100), // Random number between 0 and 100
            'wear_level' => $this->faker->randomElement(HoverCraftEnum::levels()), // Use Enum values here
            'age' => $this->faker->numberBetween(0, 20), // Random number between 0 and 20
        ];
    }
}
