<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'pending',
            'detail' => 'Your appointment is yet to confirm'
        ]);

        DB::table('statuses')->insert([
            'name' => 'confirmed',
            'detail' => 'Your appointment is now confirmed'
        ]);

        DB::table('statuses')->insert([
            'name' => 'arrived',
            'detail' => 'Reached Clinic'
        ]);

        DB::table('statuses')->insert([
            'name' => 'waiting',
            'detail' => 'You are in que'
        ]);

        DB::table('statuses')->insert([
            'name' => 'active',
            'detail' => 'Consulting with doctor'
        ]);

        DB::table('statuses')->insert([
            'name' => 'completed',
            'detail' => 'Appointment Done'
        ]);

        DB::table('statuses')->insert([
            'name' => 'cancelled',
            'detail' => 'Appointment Cancelled'
        ]);

        DB::table('statuses')->insert([
            'name' => 'available',
            'detail' => 'Doctor is available at clinic'
        ]);

        DB::table('statuses')->insert([
            'name' => 'unavailable',
            'detail' => 'Doctor is unavailable for current session'
        ]);

    }
}
