<?php

use Illuminate\Database\Seeder;

class WardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Ward::create([
           'district_id' => 1,
           'name' => 'Mai Dich',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 1,
           'name' => 'Nghia Tan',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 2,
           'name' => 'Kim Lien',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 2,
           'name' => 'Nam Dong',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 3,
           'name' => 'Vinh Phuc',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 3,
           'name' => 'Ngoc Ha',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 4,
           'name' => 'Dong Ky',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 4,
           'name' => 'Phu Khe',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 5,
           'name' => 'Dong Tho',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 5,
           'name' => 'Van Mon',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 6,
           'name' => 'TT Lim',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 6,
           'name' => 'Noi Due',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 7,
           'name' => 'Van Son',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 7,
           'name' => 'Ngoc Xuyen',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 8,
           'name' => 'Lai Xa',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 8,
           'name' => 'Lai Son',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 9,
           'name' => 'Minh Duc',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 9,
           'name' => 'Teu Bang',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 10,
           'name' => 'Ha Khanh',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 10,
           'name' => 'Ha TRung',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 11,
           'name' => 'Hong Mai',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 11,
           'name' => 'Cao Thang',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 12,
           'name' => 'Cao Xanh',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);

        App\Ward::create([
           'district_id' => 12,
           'name' => 'Yet Kieu',
           'created_at' => new Datetime(),
           'updated_at' => new Datetime(),
        ]);
    }
}
