<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\SalesRep;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 'C' . $this->faker->numberBetween(0, 99999),
            'honorific' => $this->faker->title(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'house_number' => $this->faker->buildingNumber(),
            'street' => $this->faker->streetName(),
            'account' => $this->faker->randomNumber(6, true),
            'sales_rep_id' => SalesRep::inRandomOrder()->first()->id
        ];
    }
}
