<?php

namespace Database\Seeders;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * @return void
     */
    public function run()
    {
        // Doctor::factory()->count(50)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
