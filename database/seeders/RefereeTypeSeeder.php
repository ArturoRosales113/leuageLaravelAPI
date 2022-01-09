<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RefereeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referee_types')->insert([
            'name' => 'central',
            'display_name' => 'central',
            'sport_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('referee_types')->insert([
            'name' => 'mesa',
            'display_name' => 'mesa',
            'sport_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('referee_types')->insert([
            'name' => 'auxiliar',
            'display_name' => 'auxiliar',
            'sport_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
    }
}
