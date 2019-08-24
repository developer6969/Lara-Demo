<?php

use Illuminate\Database\Seeder;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->insert([
            'name' => "Aditya Medical Center",
            'phone' => "9899666666",
            'photo' => "default_c.jpg",
            'about' => "Its a 50 years old clinic, serving paitent with atmost care & deligenace",
            'incharge' => "Mrs. Rachna Parikh",
            'opentime' => "09:00",
            'lunchtime' => "",
            'lunchduration' => "",
            'closetime' => "21:00",
            'holiday' => "",
            'number' => "C3/11",
            'street' => "Rana Pratap Bagh",
            'area' => "Ashok Vihar",
            'city' => "New Delhi",
            'state' => "Delhi",
            'country' => "India",
            'pincode' => "110007",
            'landmark' => "Nanak Pio Gurudwara",
            'gps_long' => "28.6854737",
            'gps_lati' => "77.1936432"
        ]);

        DB::table('clinics')->insert([
            'name' => "Aditya Medical Care",
            'phone' => "9899666666",
            'photo' => "default_c.jpg",
            'about' => "Its a 50 years old clinic, serving paitent with atmost care & deligenace",
            'incharge' => "Mr. Bablu Kumar",
            'opentime' => "18:00",
            'lunchtime' => "",
            'lunchduration' => "",
            'closetime' => "20:00",
            'holiday' => "",
            'number' => "3442",
            'street' => "Onkar Nagar B",
            'area' => "Tri Nagar",
            'city' => "New Delhi",
            'state' => "Delhi",
            'country' => "India",
            'pincode' => "110035",
            'landmark' => "Hansa Puri Road",
            'gps_long' => "28.6766387",
            'gps_lati' => "77.1573965"
        ]);
    }
}
