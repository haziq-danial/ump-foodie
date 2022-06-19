<?php

namespace Database\Factories;

use App\Classes\Constants\RoleType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'username' => $this->faker->userName,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role_type' => $this->faker->numberBetween($min = 1, $max = 3),
            'remember_token' => Str::random(10),
        ];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::ADMIN,
            ];
        });
    }

    public function customer()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::CUSTOMER,
            ];
        });
    }

    public function owner()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::RESTAURANT_OWNER,
            ];
        });
    }

    public function rider()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::RIDER,
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
