<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([RolesAndPermissionsSeeder::class]);
        $this->call([PermissionSeeder::class]);
        // $this->call([SportSeeder::class]);
        // $this->call([CategorySeeder::class]);
        // $this->call([ModalitySeeder::class]);
        // $this->call([MaterialSeeder::class]);
        // $this->call([RefereeTypeSeeder::class]);
        // $this->call([LeagueSeeder::class]);
        // $this->call([TournamentSeeder::class]);
        // $this->call([LocationSeeder::class]);
        // $this->call([FieldSeeder::class]);
        // $this->call([RefereeSeeder::class]);
        // $this->call([TeamSeeder::class]);
        // $this->call([PlayerSeeder::class]);

        

    }
}
