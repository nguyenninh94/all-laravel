<?php

use Illuminate\Database\Seeder;

class ProductTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product::create([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'Harry Potter',
            'description' => 'Super cool - as least at a child',
            'price' => 20
        ]);

        App\Product::create([
            'imagePath' => 'http://img14.deviantart.net/e306/i/2015/312/5/9/a_song_of_ice_and_fire_by_ertacaltinoz-d9fzd8e.jpg',
            'title' => 'A song of ice anf fire - A storm of swords',
            'description' => 'No one is going to servive',
            'price' => 15
        ]);

        App\Product::create([
            'imagePath' => 'http://barkerhost.com/wp-content/uploads/sites/4/2015/10/lord-of-rings-trilogy.jpg',
            'title' => 'Lord of the rings',
            'description' => 'I found the movies to be better',
            'price' => 15
        ]);

        App\Product::create([
            'imagePath' => 'https://i.ytimg.com/vi/aJJrkyHas78/maxresdefault.jpg',
            'title' => 'Juressis Word',
            'description' => 'Juressis Word official trailer',
            'price' => 25
        ]);

        App\Product::create([
            'imagePath' => 'http://vtv1.vcmedia.vn/Uploaded/mylinh/2013_11_09/S2.jpeg',
            'title' => 'Star war',
            'description' => 'Super star war',
            'price' => 15
        ]);

        App\Product::create([
            'imagePath' => 'https://cdn0.vox-cdn.com/uploads/chorus_asset/file/6173241/7089-The_Amazing_Spiderman_keyart2_alt_HD.jpg',
            'title' => 'Spiderman',
            'description' => 'Amazing spider man poster battle damage',
            'price' => 20
        ]);

    }
}
