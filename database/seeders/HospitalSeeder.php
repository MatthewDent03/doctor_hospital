<?php

// database/seeders/HospitalSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital; // Make sure to import the correct namespace for your Hospital model

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    //creating the hospital seeder to create 3 instances of hospitals that contain 4 doctors each
    {
        Hospital::factory()
            ->times(3)
            ->hasDoctors(4)
            ->create();
    }
}
