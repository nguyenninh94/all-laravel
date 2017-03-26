<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\District::create([
           'province_id' => 1,
           'name' => 'Cau Giay',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 1,
           'name' => 'Ba Dinh',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 1,
           'name' => 'Dong Da',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);


        App\District::create([
           'province_id' => 2,
           'name' => 'Tu Son',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 2,
           'name' => 'Yen Phong',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 2,
           'name' => 'Tien Du',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 3,
           'name' => 'Do Son',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 3,
           'name' => 'Ngo Quyen',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 3,
           'name' => 'Le Chan',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 4,
           'name' => 'Ha Long',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 4,
           'name' => 'Cam Pha',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\District::create([
           'province_id' => 4,
           'name' => 'Mong Cai',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

    }
}
