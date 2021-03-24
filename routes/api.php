<?php

use App\Http\Controllers\RoomController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('rooms', [RoomController::class, 'all']);
Route::get('rooms/{id}', [RoomController::class, 'show']);
Route::post('rooms', [RoomController::class, 'add']);
Route::put('rooms/{id}', [RoomController::class, 'edit']);
Route::delete('rooms/{id}', [RoomController::class, 'delete']);
