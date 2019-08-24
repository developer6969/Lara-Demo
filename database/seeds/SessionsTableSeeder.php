<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            'name' => 'Morning',
            'start_time' => '09:00',
            'end_time' => '11:00'
        ]);

        DB::table('sessions')->insert([
            'name' => 'Morning',
            'start_time' => '11:00',
            'end_time' => '13:00'
        ]);

        DB::table('sessions')->insert([
            'name' => 'Afternoon',
            'start_time' => '13:00',
            'end_time' => '15:00'
        ]);

        DB::table('sessions')->insert([
            'name' => 'Afternoon',
            'start_time' => '15:00',
            'end_time' => '17:00'
        ]);

        DB::table('sessions')->insert([
            'name' => 'Evening',
            'start_time' => '17:00',
            'end_time' => '19:00'
        ]);

        DB::table('sessions')->insert([
            'name' => 'Evening',
            'start_time' => '19:00',
            'end_time' => '21:00'
        ]);
    }
}
