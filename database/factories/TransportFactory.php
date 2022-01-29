<?php

namespace Database\Factories;

use App\Models\Tourgroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tourgroup_id' => Tourgroup::factory(),
            'car_make' => $this->faker->randomElement(['Lacetti', 'Cobalt', 'Orlando']),
            'car_extra_features' => $this->faker->randomElement(['Air Con', 'DVD', 'WiFi']),
            'train_type' => $this->faker->randomElement(['Econom', 'Business', 'VIP', 'Plaskard', 'Kupe']),
            'transport_type' => $this->faker->numberBetween(1, 3),
            'auto_type' => $this->faker->randomElement(['Sedan', 'Bus', 'MiniBus']),

        ];
    }
}
