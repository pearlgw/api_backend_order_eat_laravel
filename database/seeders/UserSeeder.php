<?php

namespace Database\Seeders;

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
        User::insert([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::insert([
            'name' => 'chef',
            'email' => 'chef@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::insert([
            'name' => 'cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::insert([
            'name' => 'waitress',
            'email' => 'waitress@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
