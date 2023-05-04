<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partners')->delete();
        
        \DB::table('partners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 5,
                'skype_id' => NULL,
                'date_of_birth' => '2019-11-07',
                'phone_number' => '1235423',
                'whats_app' => '8748979479',
                'address' => 'sjdfk lsdfjkshd fjks',
                'gender' => 'male',
                'default_location' => 'fsdkjfhs dfsdhf',
                'created_at' => '2019-11-19 11:47:47',
                'updated_at' => '2019-11-19 11:47:47',
            ),
        ));
        
        
    }
}