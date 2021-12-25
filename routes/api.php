<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('veiculos', [ApiController::class, 'getVeiculos']);    
Route::get('veiculos/find', [ApiController::class, 'getVeiculosByFilter']);
Route::get('veiculos/{:id}', [ApiController::class, 'show']);
Route::post('veiculos', [ApiController::class, 'store']);
Route::put('veiculos/{:id}', [ApiController::class, 'update']);
Route::delete('veiculos/{:id}', [ApiController::class, 'destroy']);