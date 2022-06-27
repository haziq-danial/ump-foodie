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


        // manage restaurant
        Permission::create(['name' => 'manage restaurant']);
        Permission::create(['name' => 'add restaurant']);
        Permission::create(['name' => 'edit restaurant']);
        Permission::create(['name' => 'delete restaurant']);

        // manage menu
        Permission::create(['name' => 'manage menu']);
        Permission::create(['name' => 'add menu']);
        Permission::create(['name' => 'edit menu']);
        Permission::create(['name' => 'delete menu']);

        // manage order

        // manage delivery

        // manage user

        $restaurant_owner->givePermissionTo('manage restaurant');
        $restaurant_owner->givePermissionTo('add restaurant');
        $restaurant_owner->givePermissionTo('edit restaurant');
        $restaurant_owner->givePermissionTo('delete restaurant');

        $restaurant_owner->givePermissionTo('manage menu');
        $restaurant_owner->givePermissionTo('add menu');
        $restaurant_owner->givePermissionTo('edit menu');
        $restaurant_owner->givePermissionTo('delete menu');

    }
}
