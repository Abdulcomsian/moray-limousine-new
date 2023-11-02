<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('vehicles')->delete();
        
        DB::table('vehicles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image_name' => '1574105504sedan-512.png',
                'title' => 'Suzuki',
                'plate' => '123',
                'model_no' => '2009',
                'vehicleCategory_id' => 1,
                'standard' => '2',
                'interior_color' => 'black',
                'exterior_color' => 'black',
                'length' => '12',
                'engine_capacity' => '343',
                'short_description' => '<p>askldjlas daklsdkla sdlkas dalskd ad</p>',
                'is_available' => 'YES',
                'creator_id' => 1,
                'fuel_type' => 'petrol',
                'transmission' => 'manual',
                'status' => 'approved',
                'created_at' => '2019-11-18 19:31:44',
                'updated_at' => '2019-11-18 19:31:51',
                'type_id' => NULL,
                'category_id' => NULL,
                'price_per_hour' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'image_name' => '1574105552sedan-512.png',
                'title' => 'Toyota',
                'plate' => '456',
                'model_no' => '2015',
                'vehicleCategory_id' => 2,
                'standard' => '3',
                'interior_color' => 'black',
                'exterior_color' => 'black',
                'length' => '12',
                'engine_capacity' => '545',
                'short_description' => '<p>lasjkdlaj sldkjasjd lasjdkla jsldjalsd</p>',
                'is_available' => 'YES',
                'creator_id' => 1,
                'fuel_type' => 'petrol',
                'transmission' => 'auto',
                'status' => 'approved',
                'created_at' => '2019-11-18 19:32:32',
                'updated_at' => '2019-11-18 19:32:39',
                'type_id' => NULL,
                'category_id' => NULL,
                'price_per_hour' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'image_name' => '1574105604sedan-512.png',
                'title' => 'Mercedes-Benze',
                'plate' => '789',
                'model_no' => '2018',
                'vehicleCategory_id' => 3,
                'standard' => '5',
                'interior_color' => 'black',
                'exterior_color' => 'black',
                'length' => '12',
                'engine_capacity' => '787',
                'short_description' => '<p>askjdh lasjdlkjalskdjla sldkjalskd</p>',
                'is_available' => 'YES',
                'creator_id' => 1,
                'fuel_type' => 'petrol',
                'transmission' => 'auto',
                'status' => 'approved',
                'created_at' => '2019-11-18 19:33:24',
                'updated_at' => '2019-11-18 19:33:32',
                'type_id' => NULL,
                'category_id' => NULL,
                'price_per_hour' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'image_name' => '1574147399157410140815741012791572258867car-02.jpg',
                'title' => 'Audi',
                'plate' => '123',
                'model_no' => '2017',
                'vehicleCategory_id' => 3,
                'standard' => '4',
                'interior_color' => 'black',
                'exterior_color' => 'black',
                'length' => '12',
                'engine_capacity' => '232',
                'short_description' => '<p>sdfsdlk fsldkfjklsd jflksjd f</p>',
                'is_available' => 'YES',
                'creator_id' => 1,
                'fuel_type' => 'petrol',
                'transmission' => 'auto',
                'status' => 'pending',
                'created_at' => '2019-11-19 07:09:59',
                'updated_at' => '2019-11-19 07:09:59',
                'type_id' => NULL,
                'category_id' => NULL,
                'price_per_hour' => NULL,
            ),
        ));
        
        
    }
}