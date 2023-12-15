<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()  //creating public function for fake data to be returned for the attributes of the table
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->sentence,
        ];
    }
}
