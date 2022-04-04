<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use App\Models\Tournament;
use App\Models\League;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = Tournament::create([
            'category_id' => 1, 
            'uid' => Str::random(3).'-'.Str::random(4).'-'.Str::random(3),
            'league_id' => 1,
            'name' => 'Torneo prueba',
            'number_teams' => 12,
            'gameday' => 'Lunes',
            'number_periods' => 4,
            'period_lenght' => 10,
            'time_offs' => 5,
            'number_teams_playoffs' => 8,
            'extra_time_periods' => 2,
            'extra_time' => 5
        ]);

        $tournament = Tournament::create([
            'category_id' => 3, 
            'uid' => Str::random(3).'-'.Str::random(4).'-'.Str::random(3),
            'league_id' => 2,
            'name' => 'Torneo prueba',
            'number_teams' => 9,
            'gameday' => 'Lunes',
            'number_periods' => 4,
            'period_lenght' => 10,
            'time_offs' => 5,
            'number_teams_playoffs' => 4,
            'extra_time_periods' => 2,
            'extra_time' => 5
        ]);
    }
}
