<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Matt Dent';
        $admin->email = 'N00220082@gmail.ie';
        $admin->password = Hash::make('password');   //creating an admin role
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Bianca Sloane';
        $user->email = 'biancaa@gmail.com';   //creating a user role
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
