<?php

use App\Http\Controllers\Api\BandeiraController;
use App\Http\Controllers\Api\PostoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('postos',PostoController::class);

Route::get('/posto',[PostoController::class,'index']);
Route::get('/posto/{id}',[PostoController::class,'show']);

Route::get('/bandeira',[BandeiraController::class,'index']);
Route::get('/bandeira/{id}',[BandeiraController::class,'show']);