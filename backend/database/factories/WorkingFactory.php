<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\SalesRep;
use App\Models\Working;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Working>
 */
class WorkingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $areaIds = Area::pluck('id')->all();
        $salesRepIds = SalesRep::pluck('id')->all();
        do {
            $salesRepId = $this->faker->randomElement($salesRepIds);
            $areaId = $this->faker->randomElement($areaIds);
            $existing = Working::where('sales_rep_id', $salesRepId)
                ->where('area_id', $areaId)
                ->exists();
        } while ($existing);

        return [
            'sales_rep_id' => $salesRepId,
            'area_id' => $areaId
        ];
    }
}
