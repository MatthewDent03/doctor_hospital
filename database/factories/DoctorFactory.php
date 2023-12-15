<?php
//The doctorfactory is a feature of Eloquent Object Relational Mapping, this allows the user to create model instances
//These model instances are used for seeding the database and generating fake sample data for the attributes.
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     * The general state of data type is sentence because it is most fitting as special characters are required and are defined later through validation methods in the controller
     * @return array<string, mixed>
     */
    public function definition(): array  //creating array for fake data for each attribute to be entered and returned 
    {
        return [
        'first_name' => fake()->sentence,
        'last_name' => fake()->sentence,
        'facility' => fake()->sentence,
        'phone_number' => fake()->sentence,
        'email' => fake()->sentence,
        ];
    }
}
