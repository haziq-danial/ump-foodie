<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\Rider;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::factory()->admin()->create();
        $customer = User::factory()->customer()->create();
        $owner = User::factory()->owner()->create();
        $rider = User::factory()->rider()->create();

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
