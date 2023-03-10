<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'loginUser']);
Route::post('register', [AuthController::class, 'createUser']);

Route::group(['middleware' => "auth:sanctum"], function () {

    Route::post('calculate', [CalculationController::class, 'index']);
    Route::post('calculate/mean', [CalculationController::class, 'calculate_mean']);
});