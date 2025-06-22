<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('categories' , [CategoryController::class , 'index']);

Route::prefix('auth')->group(function(){
    Route::post('login' , [AuthController::class , 'login']);
    Route::post('register' , [AuthController::class , 'register']);

});
