<?php

use App\Http\Controllers\Api\BandeiraController;
use App\Http\Controllers\Api\PostoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('postos',PostoController::class);

Route::get('/posto',[PostoController::class,'index']);
Route::get('/posto/{id}',[PostoController::class,'show']);
Route::post('/posto',[PostoController::class,'store']);
Route::put('/posto/{id}',[PostoController::class,'update']);
Route::delete('/posto/{id}',[PostoController::class,'remove']);

Route::get('/bandeira',[BandeiraController::class,'index']);
Route::get('/bandeira/{id}',[BandeiraController::class,'show']);
Route::post('/bandeira',[BandeiraController::class,'store']);
Route::put('/bandeira/{id}',[BandeiraController::class,'update']);
Route::delete('/bandeira/{id}',[BandeiraController::class,'remove']);

Route::get('/user',[UserController::class,'index']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::post('/user',[UserController::class,'store']);
Route::put('/user/{id}',[UserController::class,'update']);
Route::delete('/user/{id}',[UserController::class,'remove']);