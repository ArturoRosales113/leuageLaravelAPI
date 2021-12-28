<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'caucho',
            'display_name' => 'caucho',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'pasto_sintetico',
            'display_name' => 'pasto sintético',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'pasto_natural',
            'display_name' => 'pasto natural',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'cemento',
            'display_name' => 'cemento',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'duela',
            'display_name' => 'duela',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'agua',
            'display_name' => 'agua',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
    }
}
