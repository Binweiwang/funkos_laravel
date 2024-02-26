<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles y permisos
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        // Crear permisos
        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read role']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);

        $permission_create_category = Permission::create(['name' => 'create category']);
        $permission_read_category = Permission::create(['name' => 'read category']);
        $permission_update_category = Permission::create(['name' => 'update category']);
        $permission_delete_category = Permission::create(['name' => 'delete category']);

        $permission_create_funko = Permission::create(['name' => 'create funko']);
        $permission_read_funko = Permission::create(['name' => 'read funko']);
        $permission_update_funko = Permission::create(['name' => 'update funko']);
        $permission_delete_funko = Permission::create(['name' => 'delete funko']);
        // Asignar permisos a roles
        $permissions_admin = [$permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role, $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category, $permission_create_funko, $permission_read_funko, $permission_update_funko, $permission_delete_funko];
        $permissions_user = [$permission_read_category, $permission_read_funko];
        // Sincronizar permisos con roles
        $role_admin->syncPermissions($permissions_admin);
        $role_user->syncPermissions($permissions_user);
    }
}
