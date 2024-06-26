<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use \App\Models\SalesRep;

class SalesRepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \Faker\Generator */
        $faker = Container::getInstance()->make(Generator::class);
        // supervisor candidates
        $supervisors = SalesRep::offset(0)->limit(3)->get();;
        $supervisorsIds = $supervisors->pluck('id')->toArray();
        foreach (SalesRep::all() as $supervisee) {
            $supervisee->supervisor_id = $faker->randomElement($supervisorsIds);
            $supervisee->save();
        }
    }
}
