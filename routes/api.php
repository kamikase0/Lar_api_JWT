<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/logout',[AuthController::class,'logout']);
});

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'Auth@login');
//     Route::post('logout', 'Auth@logout');
//     Route::post('refresh', 'Auth@refresh');
//     Route::post('me', 'Auth@me');

// });