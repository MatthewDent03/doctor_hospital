<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'emergency_contact' => $this->faker->name,
            'phone_number' => $this->faker->sentence,
            'emergency_number' => $this->faker->sentence,
            'address' => $this->faker->address,
            'age' => $this->faker->numberBetween(18, 70),
            'gender' => $this->faker->sentence
        ];
    }
}
