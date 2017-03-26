<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Provice::create([
           'sortname' => 'HN',
           'name' => 'Ha Noi',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Provice::create([
           'sortname' => 'BN',
           'name' => 'Bac Ninh',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Provice::create([
           'sortname' => 'HP',
           'name' => 'Hai Phong',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Provice::create([
           'sortname' => 'QN',
           'name' => 'Quang Ninh',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);
    }
}
