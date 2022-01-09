<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use App\Models\Team;
use App\Models\User;
use App\Models\League;

use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        $leagues = League::all();

        foreach($leagues as $l)
        {
            $total_teams = $this->faker->numberBetween($min=12,$max=23);
            for ($i=1; $i < $total_teams; $i++){
                $user = User::create([
                    'name' => $this->faker->name($gender = null),
                    'email' => $l->id.'team'.$i.'@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $user->assignRole('team_administrator');

                $team = Team::create([
                    'name' => $this->faker->company().' '.$this->faker->companySuffix(),
                    'description' => $this->faker->text($maxNbChars = 200),
                    'icon_path' => 'seeders/team_logos/'.$i.'.png',
                    'img_path' =>  'seeders/team_portrait/'.$this->faker->numberBetween($min=1,$max=6).'.png',
                    'user_id' => $user->id,
                    'league_id' => $l->id
                ]);
            }
        }


    }
}
