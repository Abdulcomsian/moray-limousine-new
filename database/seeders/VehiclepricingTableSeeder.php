<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclepricingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehiclepricing')->delete();
        
        \DB::table('vehiclepricing')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '0.00',
                'to' => '100.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '200.00',
                'created_at' => '2019-11-18 18:24:13',
                'updated_at' => '2019-11-18 18:24:13',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '100.00',
                'to' => '200.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '250.00',
                'created_at' => '2019-11-18 18:24:13',
                'updated_at' => '2019-11-18 18:24:13',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 2,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '0.00',
                'to' => '200.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '300.00',
                'created_at' => '2019-11-18 18:24:55',
                'updated_at' => '2019-11-18 18:24:55',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '200.00',
                'to' => '400.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '400.00',
                'created_at' => '2019-11-18 18:24:55',
                'updated_at' => '2019-11-18 18:24:55',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 3,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '0.00',
                'to' => '200.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '400.00',
                'created_at' => '2019-11-18 18:25:24',
                'updated_at' => '2019-11-18 18:25:24',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 3,
                'created_by' => 1,
                'pricing_type' => 'per_km',
                'from' => '200.00',
                'to' => '400.00',
                'is_price_fixed' => 1,
                'base_price' => NULL,
                'fixed_price' => '500.00',
                'created_at' => '2019-11-18 18:25:24',
                'updated_at' => '2019-11-18 18:25:24',
            ),
        ));
        
        
    }
}