<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            'name' => 'basquetball',
            'display_name' => 'Basquetball',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        
        DB::table('sports')->insert([
            'name' => 'futbol',
            'display_name' => 'Futbol',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('sports')->insert([
            'name' => 'futbol_americano',
            'display_name' => 'Futbol Americano',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('sports')->insert([
            'name' => 'baseball',
            'display_name' => 'Baseball',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

    }
}
