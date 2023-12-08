<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Patient::factory()
        ->times(3)
        ->create();

        foreach(Doctor::all() as $doctor)
        {
            $patients = Patient::inRandomOrder()->take(rand(1,3))->pluck('id');
            $doctor->patients()->attach($patients);
        }
    }
}
