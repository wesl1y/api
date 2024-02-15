<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        return [
            'token' => $user->createToken("auth_token")->plainTextToken,
            'user' => new UserResource($user)
        ];
    }

     
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return [
            "message" => "logged-out successfully"
        ];
    }


    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|confirmed'
        ]);

        $user = Auth::user();

        if($user instanceof User){
            if(!Hash::check($request->current_password, $user->password)){
                return response()->json([
                    'message' => "Incorrect current password"], 401);
            }
     
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                "message"=> "Password changed successfully"
            ]);

        }
    }
}
