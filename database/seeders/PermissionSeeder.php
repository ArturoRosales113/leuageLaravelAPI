<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Super admin
        $user = User::findOrFail(3);
        $user2 = User::findOrFail(4);
        $user3 = User::findOrFail(5);
        $user->assignRole('super-admin');
        $user2->assignRole('super-admin');
        $user3->assignRole('super-admin');


    }
}
