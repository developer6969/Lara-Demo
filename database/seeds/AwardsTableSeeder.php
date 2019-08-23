<?php

use Illuminate\Database\Seeder;

class AwardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Doctor::class, 2)
        //     ->create()
        //     ->each(function ($doctor) {
        //         $doctor->award()->save(factory(App\Award::class)->make());
        // });
        for ($i=0; $i < 3; $i++) { 
	    	DB::table('awards')->insert([
	            'name' => str_random(8),
	            'detail' => str_random(12),
	            'doctor_id' => 5,
	        ]);
    	}
    }
}
