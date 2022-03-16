<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\League;
use App\Models\Referee;

use Faker\Factory as Faker;

class RefereeSeeder extends Seeder
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

            for ($i=1; $i < 13; $i++){

                $user = User::create([
                    'name' => $this->faker->name($gender = null),
                    'email' => $l->id.'referee'.$i.'@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                
                $user->assignRole('referee');

                $referee = Referee::create([
                    'user_id' => $user->id,
                    'league_id' => $l->id,
                    'refereeType_id' => $this->faker->randomElement($array = array ('1','2')),
                    'edad' => $this->faker->numberBetween($min=20,$max=71),
                    'estatura' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1.60, $max = 2.40),
                    'peso'=> $this->faker->randomFloat($nbMaxDecimals = 1, $min = 30, $max = 200),
                    'icon_path' =>  'seeders/referee_photos/'.$this->faker->numberBetween($min=1,$max=2).'.jpg',
                    'licencia' => $this->faker->randomNumber($nbDigits = 7, $strict = false),
                ]);
            }
        }
    }
}
