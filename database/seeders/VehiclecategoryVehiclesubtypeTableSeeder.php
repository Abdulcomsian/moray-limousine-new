<?php

use Illuminate\Database\Seeder;

class VehiclecategoryVehiclesubtypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehiclecategory_vehiclesubtype')->delete();
        
        \DB::table('vehiclecategory_vehiclesubtype')->insert(array (
            0 => 
            array (
                'category_id' => 1,
                'subtype_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'category_id' => 1,
                'subtype_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'category_id' => 2,
                'subtype_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'category_id' => 2,
                'subtype_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'category_id' => 3,
                'subtype_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'category_id' => 3,
                'subtype_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}