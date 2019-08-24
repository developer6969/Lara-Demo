<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 25; $i++) { 
            DB::table('schedules')->insert([
                'doctor_id' => 1,  // Asha Gupta
                'clinic_id' => 1,  // Tri Nagar
                'session_id' => 1, // Morning
                'day_id' => 1,     // Monday
                'charge_id' => 1,  // 500
                'status' => 'available',
            ]);
        }
    }
}
