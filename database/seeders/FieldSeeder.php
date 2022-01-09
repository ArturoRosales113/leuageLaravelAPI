<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Location;
use App\Models\Field;

use Faker\Factory as Faker;


class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        $locations = Location::all();

        foreach($locations as $l)
        {
            $total_fields = $this->faker->numberBetween($min=3,$max=6);
            
            for ($i=1; $i < $total_fields; $i++){

                $name = $this->faker->company().' '.$this->faker->companySuffix();

                $field = Field::create([
                    'name' => Str::slug($name, '-'),
                    'display_name' => $name,
                    'description' => $this->faker->text($maxNbChars = 200),
                    'location_id' => $l->id,
                    'material_id' => 5,
                    'width' => 28,
                    'height' => 15

                ]);
            }
        }
    }
}
