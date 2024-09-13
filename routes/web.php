<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BandeiraController;

Route::get('/postos', [PostoController::class,'index']);
Route::get('/users', [UserController::class,'index']);
Route::get('/bandeiras', [BandeiraController::class,'index']);

Route::get('/postos/{id}', [PostoController::class,'show']);
Route::get('/users/{id}', [UserController::class,'show']);
Route::get('/bandeiras/{id}', [BandeiraController::class,'show']);

Route::get('/posto', [PostoController::class,'create']);
Route::get('/user', [UserController::class,'create']);
Route::get('/bandeira', [BandeiraController::class,'create']);

Route::post('/posto', [PostoController::class,'store']);
Route::post('/user', [UserController::class,'store']);
Route::post('/bandeira', [BandeiraController::class,'store']);

Route::get('/postos/{id}/edit', [PostoController::class,'edit'])->name('posto.edit');
Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('user.edit');
Route::get('/bandeiras/{id}/edit', [BandeiraController::class,'edit'])->name('bandeira.edit');

Route::post('/postos/{id}/edit', [PostoController::class,'update'])->name('posto.update');
Route::post('/users/{id}/edit', [UserController::class,'update'])->name('user.update');
Route::post('/bandeiras/{id}/edit', [BandeiraController::class,'update'])->name('bandeira.update');

Route::get('/postos/{id}/delete', [PostoController::class,'destroy'])->name('posto.delete');
Route::get('/users/{id}/delete', [UserController::class,'destroy'])->name('user.delete');
Route::get('/bandeiras/{id}/delete', [BandeiraController::class,'destroy'])->name('bandeira.delete');