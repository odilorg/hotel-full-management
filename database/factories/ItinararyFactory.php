<?php

namespace Database\Factories;

use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItinararyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transport_id' => Transport::factory(),
            'pickup_or_dropoff_or_marshrut' => $this->faker->randomElement(['Pickup', 'Dropoff', 'Marshrut']),
            'pickup_or_dropoff_date_time' => $this->faker->dateTimeBetween('+1 week', '+2 week'),
            
            'pickup_or_dropoff_from' => $this->faker->randomElement(['Samarkand', 'Bukhara', 'Khiva']),
            'pickup_or_dropoff_to' => $this->faker->randomElement(['Hotel Jahongir', 'Vokzal', 'Aeroport']),
            'driver_name' => $this->faker->randomElement(['Ozod', 'Mahmud', 'Akram']),
            'driver_tel' => $this->faker->phoneNumber,
            'train_class' => $this->faker->randomElement(['Econom', 'Business', 'VIP', 'Plaskard', 'Kupe']),
            'train_name' => $this->faker->randomElement(['Afrosiyob', 'Shark', 'Passajirskiy']),
            'plane_class' => $this->faker->randomElement(['Econom', 'Business', 'VIP'])
 
        ];
    }
}
