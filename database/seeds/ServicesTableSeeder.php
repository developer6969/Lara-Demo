<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
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
        //         $doctor->service()->save(factory(App\Service::class)->make());
        // });

        for ($i=0; $i < 3; $i++) { 
	    	DB::table('services')->insert([
	            'name' => str_random(8),
	            'detail' => str_random(12),
	            'doctor_id' => 5,
	        ]);
    	}

    }
}
