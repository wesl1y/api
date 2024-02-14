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
        User::create([
            "name" => "admin2",     
            "email" => "admin2@gmail.com",
            "cpf" => "147.787.484-31",
            "registration" => "447787711",
            "password" => Hash::make("12345"),
        ]);
    }
}
