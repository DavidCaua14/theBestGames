<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("/register", [AuthController::class,"register"]);
Route::post("/login", [AuthController::class,"login"]);
Route::middleware('auth:sanctum')->post('/validate-token', [AuthController::class, 'validateToken']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get("/game", [GameController::class,"index"]);

Route::group(["middleware"=> ["auth:sanctum", "can:admin-access"]], function () {
    Route::post("/game", [GameController::class,"store"]);  
    Route::get("/game/{id}", [GameController::class,"show"]);
    Route::put("/game/{id}", [GameController::class,"update"]);
    Route::delete("/game/{id}", [GameController::class,"destroy"]); 
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


