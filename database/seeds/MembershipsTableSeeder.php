<?php

use Illuminate\Database\Seeder;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
	    	DB::table('memberships')->insert([
	            'name' => str_random(8),
	            'detail' => str_random(12),
	            'doctor_id' => 5,
	        ]);
    	}
    }
}
