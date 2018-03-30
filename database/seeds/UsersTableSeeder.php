<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Laravel', 'email' => str_random(5) . '@gmail.com', 'password' => bcrypt('password')], 
            ['name' => 'CI', 'email' =>  str_random(5) . '@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Zend', 'email' =>  str_random(5) . '@gmail.com', 'password' => bcrypt('password')]
        ]);
    }
}
