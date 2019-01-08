<?php

use Illuminate\Database\Seeder;

class BusStopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus_stop')->insert([
            [
                'name' => 'Bus stop 1',
                'lat' => '20.980440',
                'lng' => '105.784552'
            ],

            [
                'name' => 'Bus stop 2',
                'lat' => '20.980781',
                'lng' => '105.788942'
            ],

            [
                'name' => 'Bus stop 3',
                'lat' => '20.976795',
                'lng' => '105.783159'
            ],

            [
                'name' => 'Bus stop 4',
                'lat' => '20.978032',
                'lng' => '105.787743'
            ],

            [
                'name' => 'Bus stop 5',
                'lat' => '20.974833',
                'lng' => '105.779845'
            ],

            [
                'name' => 'Bus stop 6',
                'lat' => '20.973321',
                'lng' => '105.784884'
            ],

        ]);
    }
}
