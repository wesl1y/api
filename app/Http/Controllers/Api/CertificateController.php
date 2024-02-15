<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::with('server', 'user')->get();
        return response()->json(CertificateResource::collection($certificates));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $certificate = Certificate::create([
            "process" => $request->process,
            "status" => $request->status,
            "start" => $request->start,
            "end" => $request->end,
            "user_id" => Auth::user()->id,
            "server_id" => $request->server_id,
        ]);

        return response()->json(
            new CertificateResource($certificate)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $certificate = Certificate::with('user', 'server')->findOrFail($id);
        
        return response()->json([
            new CertificateResource($certificate),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->update([
            "process" => $request->process,
            "status" => $request->status,
            "start" => $request->start,
            "end" => $request->end,
        ]);

        return response()->json(
            new CertificateResource($certificate)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id)->delete();
        return response()->json($certificate);
    }
}
