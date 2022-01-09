<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Arturo R.',
            'email' => 'arispero0990@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Admin Dos
        DB::table('users')->insert([
            'name' => 'Abel',
            'email' => 'abel.landa@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //Admin Dos
        DB::table('users')->insert([
            'name' => 'Julio',
            'email' => 'jescalantem777@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Playmaker2022!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //Admin Dos
        DB::table('users')->insert([
            'name' => 'Gustavo',
            'email' => 'gustavo@sfleet.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('Playmaker2022!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        
        //Jugadores

        //Arbitros

    }
}
