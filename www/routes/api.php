<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\XAPIStatmentController;
use App\Http\Controllers\Api\ScenariosController;
use App\Http\Controllers\Api\GameSessionsController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);



Route::post('/protocols/getNewSession', [GameSessionsController::class, 'getNewSession']);
Route::get('/protocols/getScenarios', [GameSessionsController::class, 'getScenarios']);

//Route::middleware('auth:api')->group( function () {

Route::get('/xapi/statements/{sessioneky}', [XAPIStatmentController::class, 'showBySession']);
Route::apiresource('xapi/statements', XAPIStatmentController::class);
//});


Route::apiResource('xapi/gamescenarios', ScenariosController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
