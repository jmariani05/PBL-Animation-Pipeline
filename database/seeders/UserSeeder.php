<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Project',
            'last_name' => 'Manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'phone' => '+6281234567890',
            'role' => 'manager',
            'password' => Hash::make('Pass1234'),
        ]);
    }
}
