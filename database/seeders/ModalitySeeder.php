<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalities')->insert([
            'name' => 'torneo',
            'display_name' => 'torneo',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('modalities')->insert([
            'name' => 'rapido',
            'display_name' => 'rápido',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);

        DB::table('modalities')->insert([
            'name' => 'amistoso',
            'display_name' => 'amistoso',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'icon_path' => 'img/default-icon.jpg',
            'img_path' => 'img/default-img.jpg'
        ]);
    }
}
