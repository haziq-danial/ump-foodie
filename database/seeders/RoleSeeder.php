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
        Permission::create(['name' => 'manage order']);
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
        
        // manage delivery
        Permission::create(['name' => 'manage delivery']);
        Permission::create(['name' => 'create delivery']);
        Permission::create(['name' => 'edit delivery']);
        Permission::create(['name' => 'delete delivery']);
        
        // manage complaint
        Permission::create(['name' => 'manage complaint']);
        Permission::create(['name' => 'create complaint']);
        Permission::create(['name' => 'edit complaint']);
        Permission::create(['name' => 'delete complaint']);

        $restaurant_owner->givePermissionTo('manage restaurant');
        $restaurant_owner->givePermissionTo('add restaurant');
        $restaurant_owner->givePermissionTo('edit restaurant');
        $restaurant_owner->givePermissionTo('delete restaurant');

        $restaurant_owner->givePermissionTo('manage menu');
        $restaurant_owner->givePermissionTo('add menu');
        $restaurant_owner->givePermissionTo('edit menu');
        $restaurant_owner->givePermissionTo('delete menu');

        $customer->givePermissionTo('manage order');
        $customer->givePermissionTo('create order');
        $customer->givePermissionTo('edit order');
        $customer->givePermissionTo('delete order');

        $customer->givePermissionTo('manage complaint');
        $customer->givePermissionTo('create complaint');
        $customer->givePermissionTo('edit complaint');
        $customer->givePermissionTo('delete complaint');

        $rider->givePermissionTo('manage delivery');
        $rider->givePermissionTo('create delivery');
        $rider->givePermissionTo('edit delivery');
        $rider->givePermissionTo('delete delivery');

        $rider->givePermissionTo('manage complaint');
        $rider->givePermissionTo('edit complaint');
        

    }
}
