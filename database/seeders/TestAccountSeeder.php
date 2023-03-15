<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "email" => "guest@bersama.com",
            "password" => Hash::make("password123"),
            "name" => "Guest"
        ])->assignRole(['guest']);
        User::create([
            "email" => "norole@bersama.com",
            "password" => Hash::make("password123"),
            "name" => "No Role"
        ]);
        User::create([
            "email" => "relawan@bersama.com",
            "password" => Hash::make("password123"),
            "name" => "Relawan"
        ])->assignRole(['relawan']);
        User::create([
            "email" => "aliffia0826@gmail.com",
            "password" => Hash::make("password123"),
            "name" => "Alif Fia"
        ])->assignRole(['relawan']);
    }
}
