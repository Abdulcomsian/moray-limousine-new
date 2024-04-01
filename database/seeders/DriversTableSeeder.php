<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('drivers')->delete();
        
        \DB::table('drivers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'date_of_birth' => '2019-11-19',
                'gender' => 'Male',
                'phone_number' => '1234567',
                'whats_app' => '1234567',
                'skype_id' => '1234567',
                'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'permanent_address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'default_location' => 'Berliner Dom, Am Lustgarten, Berlin, Germany',
                'additional_information' => NULL,
                'vehicle_licence_no' => '1234567',
                'vehicle_licence_expiry' => '2020-10-21',
                'vehicle_licence_image' => '1574106403web-3967926_1920.jpg',
                'pco_licence_no' => '1234567',
                'pco_licence_expiry' => '2021-02-18',
                'pco_licence_image' => '1574106403web-3967926_1920.jpg',
                'id_card_number' => '1234567',
                'id_card_image' => 'D:\\xampp\\tmp\\php5DC6.tmp',
                'deleted_at' => NULL,
                'created_at' => '2019-11-18 19:46:43',
                'updated_at' => '2019-11-18 19:46:43',
                'is_available' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'date_of_birth' => '2019-11-15',
                'gender' => 'Male',
                'phone_number' => '1234567',
                'whats_app' => '1234567',
                'skype_id' => '1234567',
                'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'permanent_address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'default_location' => 'Berlin Schönefeld Airport (SXF), Berlin, Germany',
                'additional_information' => NULL,
                'vehicle_licence_no' => '1234567',
                'vehicle_licence_expiry' => '2020-08-13',
                'vehicle_licence_image' => '1574106704web-3967926_1920.jpg',
                'pco_licence_no' => '1234567',
                'pco_licence_expiry' => '2020-08-19',
                'pco_licence_image' => '1574106704web-3967926_1920.jpg',
                'id_card_number' => '1234567',
                'id_card_image' => 'D:\\xampp\\tmp\\phpF6E8.tmp',
                'deleted_at' => NULL,
                'created_at' => '2019-11-18 19:51:44',
                'updated_at' => '2019-11-18 19:51:44',
                'is_available' => 1,
            ),
        ));
        
        
    }
}