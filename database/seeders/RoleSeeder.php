<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $professionalRole = Role::create(['name' => 'professional']);
        $userRole = Role::create(['name' => 'user']);

        // Crear permisos
        $createPermission = Permission::create(['name' => 'create']);
        $readPermission = Permission::create(['name' => 'read']);
        $updatePermission = Permission::create(['name' => 'update']);
        $deletePermission = Permission::create(['name' => 'delete']);
        $manageUsersPermission = Permission::create(['name' => 'manage_users']);
        $manageProfilesPermission = Permission::create(['name' => 'manage_profiles']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([
            'create',
            'read',
            'update',
            'delete',
            'manage_users',
            'manage_profiles',
        ]);

        $professionalRole->givePermissionTo([
            'read',
            'update',
            'delete',
            'manage_profiles',
        ]);

        $userRole->givePermissionTo([
            'read',
            'update',
        ]);
            // Asignar roles a usuarios
            $adminUser = User::find(1);
            $adminUser->assignRole('admin');
    }
}