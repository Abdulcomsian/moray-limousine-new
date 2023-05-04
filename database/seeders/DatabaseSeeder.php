<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(VehiclecategoryTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(VehicleSubtypesTableSeeder::class);
        $this->call(VehiclecategoryVehiclesubtypeTableSeeder::class);
        $this->call(VehiclepricingTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
    }
}
