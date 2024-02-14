<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::create([
            "name"=> "weslly",
            "cpf"=> "14778778430",
            "cid"=> "125429",
            "registration"=> 12549,
            "workload"=> 30,
            "place"=> "Maceio",
            "uf" => "AL"
        ]);
    }
}
