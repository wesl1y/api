<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('certificatesUser')->get();
        return response()->json(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatePassword = $request->validate([
            "password"=> "required|string|confirmed",
        ]);

        $user= User::create([ 
            "name" => $request->name,     
            "cpf" => $request->cpf,
            "registration" => $request->registration,
            "email" => $request->email,
            "password" => Hash::make($validatePassword['password']),
            
        ]);

        return response()->json(
            new UserResource($user)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('certificatesUser')->findOrFail($id);

        return response()->json(
            new UserResource($user)
        );
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            "name" => $request->name,     
            "cpf" => $request->cpf,
            "registration" => $request->registration,
            "email" => $request->email,
        ]);

        return response()->json(
            new UserResource($user)
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id)->delete();

        return response()->json($user);
    }
}
