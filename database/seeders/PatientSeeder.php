<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{

    public function run(): void
    {
        Patient::factory()
        ->times(3)
        ->create();

        foreach (Doctor::all() as $doctor) {
            $patients = Patient::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $doctor->patients()->attach($patients);
        }
        
    }
}
