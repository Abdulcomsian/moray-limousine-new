<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclecategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehiclecategory')->delete();
        
        \DB::table('vehiclecategory')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Economy',
                'picture' => '157410140815741012791572258867car-02.jpg',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis eros ut tellus euismod cursus. Sed non pulvinar metus. Maecenas nec tincidunt arcu, vel egestas est. Integer aliquam, odio in efficitur ornare, tortor leo pulvinar nunc, sed sodales diam ligula ac magna.</p>',
                'max_bags' => 6,
                'max_seats' => 7,
                'price_per_km' => '20.00',
                'price_per_hr' => '199.43',
                'created_by' => 1,
                'modified_by' => NULL,
                'is_public' => '1',
                'created_at' => '2019-11-18 18:21:19',
                'updated_at' => '2019-11-18 18:23:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business',
                'picture' => '15741013371573933043bus_2.jpg',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis eros ut tellus euismod cursus. Sed non pulvinar metus. Maecenas nec tincidunt arcu, vel egestas est. Integer aliquam, odio in efficitur ornare, tortor leo pulvinar nunc, sed sodales diam ligula ac magna.</p>',
                'max_bags' => 10,
                'max_seats' => 10,
                'price_per_km' => '30.00',
                'price_per_hr' => '300.00',
                'created_by' => 1,
                'modified_by' => NULL,
                'is_public' => '1',
                'created_at' => '2019-11-18 18:22:17',
                'updated_at' => '2019-11-18 18:22:17',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Premium',
                'picture' => '15741013721572944655car-03.png',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis eros ut tellus euismod cursus. Sed non pulvinar metus. Maecenas nec tincidunt arcu, vel egestas est. Integer aliquam, odio in efficitur ornare, tortor leo pulvinar nunc, sed sodales diam ligula ac magna.</p>',
                'max_bags' => 12,
                'max_seats' => 8,
                'price_per_km' => '40.00',
                'price_per_hr' => '400.00',
                'created_by' => 1,
                'modified_by' => NULL,
                'is_public' => '1',
                'created_at' => '2019-11-18 18:22:52',
                'updated_at' => '2019-11-18 18:22:52',
            ),
        ));
        
        
    }
}