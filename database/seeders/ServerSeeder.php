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
            "id" => "500031",
            "nome" => "weslly",
            "cpf" => "1234567",
            "cid" => "1234567",
            "rg" => "1234567",
            "endereco" => '1234567',
            "email" => '123467@gmail.com',
            "telefone" => "1234657",
            "matricula_1" => "1234567",
            "carga_horaria_1" => 30,
            "matricula_2" => "12345679",
            "carga_horaria_2" => 30,
        ]);
    }
}
