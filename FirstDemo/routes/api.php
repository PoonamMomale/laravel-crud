<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user',function(){
//     return "hey";
// });

// Route::get('/test',function(){
//     p('working');
// });

Route::get('/user/get',[CustomerController::class,'index']);
Route::get('/user/{id}',[CustomerController::class,'show']);
Route::post('/user/store','App\Http\Controllers\CustomerController@store');
Route::delete('/user/{id}',[CustomerController::class,'destroy']);
Route::put('/user/{id}',[CustomerController::class,'update']);
