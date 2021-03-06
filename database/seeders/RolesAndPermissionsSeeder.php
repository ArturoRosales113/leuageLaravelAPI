<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create roles and assign created permissions

        //Super admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::findOrFail(1);
        $user2 = User::findOrFail(2);
        $user->assignRole($role);
        $user2->assignRole($role);

        // Back Office
        $role = Role::create(['name' => 'back_office']);
        //Administrador de liga y permisos
        $role = Role::create(['name' => 'league_administrator']);
        // Capitan encargado de equipo
        $role = Role::create(['name' => 'team_administrator']);

        // Arbitro
        $role = Role::create(['name' => 'referee']);

        // jugador
        $role = Role::create(['name' => 'player']);



    }
}
