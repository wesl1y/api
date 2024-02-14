<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServerResource;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $server = Server::with('certificatesServer')->get();
        return response()->json(ServerResource::collection($server));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $server = Server::create([
            "name"=> $request->name,
            "cpf" => $request->cpf,
            "cid" => $request->cid,
            "registration"=> $request->registration,
            "workload" => $request->workload,
            "email" => $request->email,
            "phone" => $request->phone,
            "cep" => $request->cep,
            "place" => $request->place,
            "number" => $request->number,
            "neighborhood" => $request->neighborhood,
            "county" => $request->county,
            "uf" => $request->uf,
            "complement" => $request->complement,
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
        $server = Server::findOrfail($id);

        return response()->json(
            new ServerResource($server)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $server = Server::findOrFail($id);

        $server->update($request->all());

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
