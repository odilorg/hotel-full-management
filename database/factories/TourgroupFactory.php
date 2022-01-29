<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourgroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tourgroup_name' =>$this->faker->bothify('??-##'),
            'tourgroup_country' =>$this->faker->countryISOAlpha3(),
            'tourgroup_ci' =>$this->faker->dateTimeBetween('+1 week', '+2 week'),
            'tourgroup_co' =>$this->faker->dateTimeBetween('+1 week', '+2 week'),
            'tourgroup_pax' =>$this->faker->numberBetween(0, 10),
            'tourgroup_status' =>$this->faker->randomElement(['OK', 'Cancelled', 'Pending']),
            'user_id' =>User::factory()
        ];
    }
}
