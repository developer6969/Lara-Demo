<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
	    	DB::table('doctors')->insert([
                'user_id' => 5,
                'about' =>  str_random(8),
                'profile_id' => 1,
                'address_id' => 1,
	        ]);
    	}
    }
}
