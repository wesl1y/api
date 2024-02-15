<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\api\ServerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("/auth", [AuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource("/certificate", CertificateController::class);
    Route::apiResource("/user", UserController::class);
    Route::apiResource("/server", ServerController::class);
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post("/change-password", [AuthController::class, "changePassword"]);
});
