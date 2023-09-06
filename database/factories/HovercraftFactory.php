<?php

namespace Database\Factories;

use App\Models\Hovercraft;
use App\Enums\WearLevel;
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
            'fuel_level' => $this->faker->numberBetween(0, 100),
            'wear_level' => $this->faker->randomElement(WearLevel::values()),
            'age' => $this->faker->numberBetween(0, 20),
        ];
    }
}
