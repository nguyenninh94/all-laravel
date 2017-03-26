<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Location::create([
           'city' => 'Dong Xuat',
           'lat' => '21.168609',
           'lng' => '105.950540'
        ]);

        App\Location::create([
           'city' => 'Dai hoc thuong mai',
           'lat' => '21.036300',
           'lng' => '105.775332'
        ]);

        App\Location::create([
           'city' => 'San Van Dong My Dinh',
           'lat' => '21.020766',
           'lng' => '105.764038'
        ]);
    }
}
