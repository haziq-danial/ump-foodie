<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $customer = Role::create(['name' => 'customer']);
        $admin = Role::create(['name' => 'admin']);
        $restaurant_owner = Role::create(['name' => 'restaurant owner']);
        $rider = Role::create(['name' => 'rider']);

    }
}
