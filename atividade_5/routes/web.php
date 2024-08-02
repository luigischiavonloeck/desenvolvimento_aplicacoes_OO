<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BandeiraController;

Route::get('/postos', [PostoController::class,'index']);
Route::get('/usuarios', [UsuarioController::class,'index']);
Route::get('/bandeiras', [BandeiraController::class,'index']);

Route::get('/postos/{id}', [PostoController::class,'show']);
Route::get('/usuarios/{id}', [UsuarioController::class,'show']);
Route::get('/bandeiras/{id}', [BandeiraController::class,'show']);

