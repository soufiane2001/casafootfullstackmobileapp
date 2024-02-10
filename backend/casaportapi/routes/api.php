<?php

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

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommenteController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\TerrainController;
use App\Http\Controllers\API\PictureterrainController;
use App\Http\Controllers\API\AuthController;




Route::post('login', [AuthController::class, 'login']);


Route::apiResource('users', UserController::class);









Route::middleware('auth:api')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('comments', CommenteController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('likes', LikeController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('terrains', TerrainController::class); 
    Route::apiResource('pictures-terrains', PictureterrainController::class);

});