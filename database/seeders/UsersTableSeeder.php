<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Hassan',
                'last_name' => 'Raza',
                'user_type' => 'admin',
                'phone_number' => '123456',
                'email' => 'hassan@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => NULL,
                'remember_token' => NULL,
                'status' => 'approved',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Hamza',
                'last_name' => 'M',
                'user_type' => 'end_user',
                'phone_number' => '34343434',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => NULL,
                'status' => 'approved',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'user_type' => 'driver',
                'phone_number' => '1234567',
                'email' => 'john@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => 1,
                'status' => 'approved',
                'remember_token' => '3foJ1zRM5mJ0UpypcqNLB4ap9e5oMzd15HvAeYfjc7vgiy27sMFeSRVI3kjQ',
                'created_at' => '2019-11-18 19:37:54',
                'updated_at' => '2019-11-18 19:38:18',
            ),
            3 => 
            array (
                'id' => 4,
                'first_name' => 'Jan',
                'last_name' => 'Doe',
                'user_type' => 'driver',
                'phone_number' => '1234567',
                'email' => 'jan@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => 1,
                'status' => 'approved',
                'remember_token' => NULL,
                'created_at' => '2019-11-18 19:38:08',
                'updated_at' => '2019-11-18 19:38:22',
            ),
            4 => 
            array (
                'id' => 5,
                'first_name' => 'Kashif',
                'last_name' => 'Raza',
                'user_type' => 'partner',
                'phone_number' => '1235423',
                'email' => 'partner1@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => 1,
                'status' => 'approved',
                'remember_token' => NULL,
                'created_at' => '2019-11-19 11:44:59',
                'updated_at' => '2019-11-19 11:45:03',
            ),
            5 => 
            array (
                'id' => 6,
                'first_name' => 'Bilal',
                'last_name' => 'Ahmad',
                'user_type' => 'partner',
                'phone_number' => '988756877678',
                'email' => 'partner2@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => 1,
                'status' => 'approved',
                'remember_token' => NULL,
                'created_at' => '2019-11-19 11:45:57',
                'updated_at' => '2019-11-19 11:46:01',
            ),
            6 => 
            array (
                'id' => 7,
                'first_name' => 'Sultan',
                'last_name' => 'Ahmad',
                'user_type' => 'partner',
                'phone_number' => '766857',
                'email' => 'partner3@gmail.com',
                'password' => bcrypt('123456'),
                'creator_id' => 1,
                'status' => 'approved',
                'remember_token' => NULL,
                'created_at' => '2019-11-19 11:46:25',
                'updated_at' => '2019-11-19 11:46:29',
            ),
        ));
        
        
    }
}