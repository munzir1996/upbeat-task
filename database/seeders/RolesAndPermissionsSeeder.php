<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

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

        $superAdmin = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);
        $admin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);

        $createPermission = Permission::create(['guard_name' => 'admin', 'name' => 'create']);
        $readPermission = Permission::create(['guard_name' => 'admin', 'name' => 'read']);
        $updatePermission = Permission::create(['guard_name' => 'admin', 'name' => 'update']);
        $deletePermission = Permission::create(['guard_name' => 'admin', 'name' => 'delete']);

        $superAdmin->givePermissionTo([$createPermission, $readPermission, $updatePermission, $deletePermission]);
        $admin->givePermissionTo([$readPermission]);
    }
}
