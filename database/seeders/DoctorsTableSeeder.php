<?php
//The seeder feeds in false data into the fake data variables, it extends the seeder class and doctor class
//The doctor class will then create the specified number of instances of components when ran
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Doctor::factory(50)->create();
    }
}
