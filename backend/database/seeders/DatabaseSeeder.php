<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Customer;
use App\Models\Information;
use App\Models\Product;
use App\Models\SalesRep;
use App\Models\User;
use App\Models\Working;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            SalesRep::factory()->create([
                'id' => $user->id
            ]);
            Area::factory()->create([
                'manager_id' => $user->id
            ]);
            Customer::factory()->create([
                'sales_rep_id' => $user->id
            ]);
            Product::factory()->create([
                'sales_rep_id' => $user->id
            ]);
        });
        Information::factory(10)->create();
        Working::factory(10)->create();
        $this->call([
            SalesRepSeeder::class,
        ]);
    }
}
