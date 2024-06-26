<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesRep>
 */
class SalesRepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = $this->faker->numberBetween(1, 5);
        switch ($grade) {
            case 1:
                $salary = $this->faker->numberBetween(10000, 15000);
                break;
            case 2:
                $salary = $this->faker->numberBetween(15001, 20000);
                break;
            case 3:
                $salary = $this->faker->numberBetween(20001, 25000);
                break;
            case 4:
                $salary = $this->faker->numberBetween(25001, 30000);
                break;
            case 5:
                $salary = $this->faker->numberBetween(30001, 35000);
                break;
            default:

                $salary = 0;
                break;
        }
        return [
            'id' => User::factory(),
            'grade' => $grade,
            'salary' => $salary,
            'supervisor_id' => null,
        ];
    }
}
