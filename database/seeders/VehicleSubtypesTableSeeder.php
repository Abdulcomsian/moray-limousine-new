<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSubtypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicle_subtypes')->delete();
        
        \DB::table('vehicle_subtypes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_by' => 1,
                'title' => 'Toyota',
                'created_at' => '2019-11-18 18:15:10',
                'updated_at' => '2019-11-18 18:15:10',
            ),
            1 => 
            array (
                'id' => 2,
                'created_by' => 1,
                'title' => 'Mercedes-Benze',
                'created_at' => '2019-11-18 18:15:27',
                'updated_at' => '2019-11-18 18:15:27',
            ),
            2 => 
            array (
                'id' => 3,
                'created_by' => 1,
                'title' => 'Honda',
                'created_at' => '2019-11-18 18:15:33',
                'updated_at' => '2019-11-18 18:15:33',
            ),
            3 => 
            array (
                'id' => 4,
                'created_by' => 1,
                'title' => 'Suzuki',
                'created_at' => '2019-11-18 18:15:40',
                'updated_at' => '2019-11-18 18:15:40',
            ),
            4 => 
            array (
                'id' => 5,
                'created_by' => 1,
                'title' => 'Audi',
                'created_at' => '2019-11-18 18:15:45',
                'updated_at' => '2019-11-18 18:15:45',
            ),
            5 => 
            array (
                'id' => 6,
                'created_by' => 1,
                'title' => 'United',
                'created_at' => '2019-11-18 18:15:50',
                'updated_at' => '2019-11-18 18:15:50',
            ),
        ));
        
        
    }
}