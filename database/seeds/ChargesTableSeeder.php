<?php

use Illuminate\Database\Seeder;

class ChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
	    	DB::table('charges')->insert([
	            'name' => 'OPD',
	            'amount' => '500'
	        ]);
    	}
    }
}
