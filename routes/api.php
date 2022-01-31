<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\ProductController
use App\Http\Controllers\Api\DummyApiController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\ResourceController;
use App\Http\Controllers\SantumUserController;

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

Route::post('v1/users',[UserController::class,'create']);

Route::prefix('/v1')->middleware('auth:api')->group(function(){

    Route::get('users',[UserController::class,'show']);
    Route::put('users/{id}',[UserController::class,'update']);
    Route::delete('users/{id}',[UserController::class,'destroy']);

});

Route::get('data',[DummyApiController::class,'get_data']);

//sanctum tokens
Route::post("login",[SantumUserController::class,'index']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::apiResource("member",ResourceController::class);


    });

Route::post('add',[DeviceController::class,'add']);
Route::get('show/{id?}',[DeviceController::class,'show']);
Route::put('update',[DeviceController::class,'update']);
Route::delete('delete/{id}',[DeviceController::class,'delete']);
Route::get('search/{title}',[DeviceController::class,'search']);
Route::post('upload',[DeviceController::class,'upload']);

