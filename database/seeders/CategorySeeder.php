<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'femenil',
            'display_name' => 'femenil',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'masculino',
            'display_name' => 'masculino',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'mixto',
            'display_name' => 'mixto',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'infantil',
            'display_name' => 'infantil',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'adulto',
            'display_name' => 'adulto',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'veterano',
            'display_name' => 'veterano',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
    }
}
