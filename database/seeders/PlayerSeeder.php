<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use App\Models\Team;
use App\Models\User;
use App\Models\Player;

use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        $teams = Team::all();

        foreach($teams as $t)
        {

            for ($i=1; $i < 10; $i++){
                $user = User::create([
                    'name' => $this->faker->name($gender = null),
                    'email' => $t->id.'player'.$i.'@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $user->assignRole('player');

                $player = Player::create([
                    'user_id' => $user->id,
                    'uid' => Str::random(3).'-'.Str::random(4).'-'.Str::random(3),
                    'team_id' => $t->id,
                    'numero' => $this->faker->numberBetween($min=1,$max=99),
                    'edad' => $this->faker->numberBetween($min=5,$max=70),
                    'estatura' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1.60, $max = 2.40),
                    'peso'=> $this->faker->randomFloat($nbMaxDecimals = 1, $min = 30, $max = 200),
                    'posicion' =>  $this->faker->randomElement($array = array ('Poste','Alero', 'Centro')),
                    'apodo' => $this->faker->lastName(),
                    'is_active' => 1,
                    'is_captain' => 0,
                    'icon_path' => 'seeders/player_photos/'.$this->faker->numberBetween($min=1,$max=6).'.jpg'
                ]);
            }
        }
    }
}
