<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateResource;
use App\Http\Resources\ServerResource;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gere = $request->query("gee");
        $cargo = $request->query("cargo");
        $funcao = $request->query("funcao");

        $query = Server::query();

        if ($gere) {
            $query->whereHas('servidoresCompletar', fn($query) => $query->where('gee', $gere));
        }
        if ($cargo) {
            $query->whereHas('servidoresCompletar', fn($query) => $query->where('cargo', $cargo));
        }
        if ($funcao) {
            $query->whereHas('servidoresCompletar', fn($query) => $query->where('funcao', $funcao));
        }
        
        $server = $query->with('certificatesServer', 'servidoresCompletar')->get();
        return response()->json(ServerResource::collection($server));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $server = Server::create([
            "nome"=> $request->nome,
            "cpf" => $request->cpf,
            "rg" => $request->rg,
            "cid" => $request->cid,
            "endereco" => $request->endereco,
            "email" => $request->email,
            "telefone" => $request->telefone,
            "matricula_1" => $request->matricula_1,
            "carga_horaria_1" => $request->carga_horaria_1,
            "matricula_2" => $request->matricula_2,
            "carga_horaria_2" => $request->carga_horaria_2,
        ]);

        return response()->json(
            new ServerResource($server)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $server = Server::with('certificatesServer', 'servidoresCompletar')->findOrFail($id);

        return response()->json(
            new ServerResource($server),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $server = Server::findOrFail($id);

        $server->update([
            "nome"=> $request->nome,
            "cpf" => $request->cpf,
            "rg" => $request->rg,
            "cid" => $request->cid,
            "endereco" => $request->endereco,
            "email" => $request->email,
            "telefone" => $request->telefone,
            "matricula_1" => $request->matricula_1,
            "carga_horaria_1" => $request->carga_horaria_1,
            "matricula_2" => $request->matricula_2,
            "carga_horaria_2" => $request->carga_horaria_2,
        ]);

        return response()->json(
            new ServerResource($server)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $server = Server::findOrFail($id)->delete();
        return response()->json($server);
    }
}
