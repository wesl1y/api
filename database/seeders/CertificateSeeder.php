<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certificate::create([
            "process" => "148875",
            "status" => "deferido",
            "start" => "2024-02-18",
            "end" => "2024-02-19",
            "user_id" => 1,
            "server_id" => 33144
        ]);
    }
}
