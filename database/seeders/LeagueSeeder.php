<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\League;


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

        for ($i=1; $i < 31; $i++) { 
            $user = User::create([
                'name' => $this->faker->name($gender = null),
                'email' => 'league'.$i.'@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $user->assignRole('league_administrator');

            $league = League::create([
                'user_id' => $user->id,
                'name' => $this->faker->company().' '.$this->faker->companySuffix(),
                'sport_id' => 1,
                'icon_path' => 'seeders/league_icons/'.$this->faker->numberBetween($min=1,$max=6).'.png',
                'img_path' =>  'seeders/league_portrait/'.$this->faker->numberBetween($min=1,$max=6).'.png',
                'description' => $this->faker->text($maxNbChars = 200),
                'reglamento_path' => 'pdf/Ay3JSKihdqeGNVtnO17hh92Di5BxG05EFnUWmL0F.pdf'
            ]);


        }

    }
}
