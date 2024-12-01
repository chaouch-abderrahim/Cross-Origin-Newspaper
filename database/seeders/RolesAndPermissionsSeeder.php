<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    
    public function run()
    {
        // Créer les rôles
        $roleReader = Role::create(['name' => 'reader']);
        $roleCommenter = Role::create(['name' => 'commenter']);
        $roleAdmin = Role::create(['name' => 'admin']);

        // Créer les autorisations
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'comment articles']);
        Permission::create(['name' => 'manage articles']);

        // Assigner les autorisations aux rôles
        $roleReader->givePermissionTo('view articles');
        $roleCommenter->givePermissionTo(['view articles', 'comment articles']);
        $roleAdmin->givePermissionTo(Permission::all());

        $user = User::find(1); 
        $user->assignRole('reader');
        $user = User::find(2); 
        $user->assignRole('admin');
    }
}
