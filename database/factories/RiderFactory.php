<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RiderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 0,
            'rider_id_no' => $this->faker->regexify('[A-Z]{2}[0-9]{5}')
        ];
    }
}
