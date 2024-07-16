<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\SalesRep;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{

    /**
     * Sequential Number
     */
    private static int $sequence = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 'A' . self::$sequence++,
            'name' => $this->faker->city(),
            'depot' => $this->faker->secondaryAddress(),
            'sales_target' => $this->faker->numberBetween(100, 600),
            'manager_id' => SalesRep::inRandomOrder()->first()->id
        ];
    }
}
