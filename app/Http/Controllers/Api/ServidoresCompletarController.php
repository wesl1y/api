<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServidoresCompletarResource;
use App\Models\ServidoresCompletar;
use Illuminate\Http\Request;

class ServidoresCompletarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servidorCompletar = ServidoresCompletar::with("servidores")->get();
        return response()->json(
            ServidoresCompletarResource::collection($servidorCompletar)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $servidoresCompletar = ServidoresCompletar::create([
            "servidor_id" => $request->servidor_id,
            "matricula" => $request->matricula,
            "gee" => $request->gee,
            "cargo" => $request->cargo,
            "funcao" => $request->funcao,
            "escola" => $request->escola,
            "materia_concurso" => $request->materia_concurso,
            "materia_leciona" => $request->materia_leciona,
            "carga_horaria" => $request->carga_horaria,
        ]);

        return response()->json([
            "message" => "Lotação criada Com Sucesso",
            new ServidoresCompletarResource($servidoresCompletar)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servidoresCompletar = ServidoresCompletar::with("servidores")
        ->findOrFail($id);

        return response()->json(
            new ServidoresCompletarResource($servidoresCompletar)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servidoresCompletar = ServidoresCompletar::find($id);

        $servidoresCompletar->update([
            "servidor_id" => $request->servidor_id,
            "matricula" => $request->matricula,
            "gee" => $request->gee,
            "cargo" => $request->cargo,
            "funcao" => $request->funcao,
            "escola" => $request->escola,
            "materia_concurso" => $request->materia_concurso,
            "materia_leciona" => $request->materia_leciona,
            "carga_horaria" => $request->carga_horaria,
        ]);
        return response()->json($servidoresCompletar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servidoresCompletar = ServidoresCompletar::find($id)
        ->delete();
        return response()->json([
            "message"=> "Lotação Deletada",
            $servidoresCompletar
        ]);
    }
}
