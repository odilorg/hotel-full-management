<?php

namespace Database\Factories;

use App\Models\Tourgroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelreservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_city'=>$this->faker->randomElement(['Samarkand', 'Bukhara', 'Khiva']),
            'hotel_name' =>$this->faker->randomElement(['Jahongir', 'Komil', 'Mirza' ]),
            'checkin_date' =>$this->faker->dateTimeBetween('+1 week', '+2 week'),
            'checkout_date' =>$this->faker->dateTimeBetween('+1 week', '+2 week'),
            'early_checkin' =>$this->faker->randomElement(['2 am', '3 am', '5 am']),
            'late_checkout' =>$this->faker->randomElement(['2 pm', '3 pm', '5 pm']),
            'tourgroup_id'=>Tourgroup::factory()


        ];
    }
}
