<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $this->faker = Faker::create();

        DB::table('leagues')->insert([
            'user_id' => '2',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);

        
        DB::table('leagues')->insert([
            'user_id' => '3',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '4',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '5',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '6',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '7',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '8',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '9',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);
        DB::table('leagues')->insert([
            'user_id' => '10',
            'name' => $this->faker->catchPhrase(),
            'sport_id' => $this->faker->randomElement($array = array(1,2,3,4)),
            'icon_path' => 'img/icons/4QrumbKONxAsvP0R29z0BV5eSJz0pCDc2XEMrEBo.jpg',
            'img_path' => 'img/images/ppNBz2x8YthGq7v1uKNjo3HRqPbcn7zTdtm73HAY.jpg',
            'numero_equipos' => $this->faker->randomDigitNot(0),
            'description' => $this->faker->text($maxNbChars = 200),
            'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
        ]);




    }
}
