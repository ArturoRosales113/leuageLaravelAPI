<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


use App\Models\League;
use App\Models\Location;


use Faker\Factory as Faker;


class LocationSeeder extends Seeder
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
            $total_locations = $this->faker->numberBetween($min=2,$max=6);
            for ($i=1; $i < $total_locations; $i++){

                $name = $this->faker->company().' '.$this->faker->companySuffix();
                $location = Location::create([
                    'league_id' => $l->id,
                    'uid' => Str::random(3).'-'.Str::random(4).'-'.Str::random(3),
                    'name' => Str::slug($name, '-'),
                    'display_name' => $name,
                    'description' => $this->faker->text($maxNbChars = 200),
                    'address' => $this->faker->streetAddress(),
                    'city' => $this->faker->city(),
                    'state'=> $this->faker->state(),
                    'country' => $this->faker->country(),
                    'lat' => $this->faker->latitude($min = -90, $max = 90),
                    'long' => $this->faker->longitude($min = -180, $max = 180)

                ]);
            }
        }
    }
}
