<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\Rider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = User::factory()->customer()->create();
        $customer->assignRole('customer');
        
        $owner = User::factory()->owner()->create();
        $owner->assignRole('restaurant owner');
        
        $rider = User::factory()->rider()->create();
        $rider->assignRole('rider');
        
        $admin = User::factory()->admin()->create();
        $admin->assignRole('admin');


        Admin::factory()->create([
            'user_id' => $admin->user_id,
        ]);


        Customer::factory()->create([
            'user_id' => $customer->user_id,
        ]);

        Owner::factory()->create([
            'user_id' => $owner->user_id,
        ]);

        Rider::factory()->create([
            'user_id' => $rider->user_id,
        ]);
    }
}
