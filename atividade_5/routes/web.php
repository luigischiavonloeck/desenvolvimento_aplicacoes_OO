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

Route::get('/posto', [PostoController::class,'create']);
Route::get('/usuario', [UsuarioController::class,'create']);
Route::get('/bandeira', [BandeiraController::class,'create']);

Route::post('/posto', [PostoController::class,'store']);
Route::post('/usuario', [UsuarioController::class,'store']);
Route::post('/bandeira', [BandeiraController::class,'store']);

Route::get('/postos/{id}/edit', [PostoController::class,'edit'])->name('posto.edit');
Route::get('/usuarios/{id}/edit', [UsuarioController::class,'edit'])->name('usuario.edit');
Route::get('/bandeiras/{id}/edit', [BandeiraController::class,'edit'])->name('bandeira.edit');

Route::post('/postos/{id}/edit', [PostoController::class,'update'])->name('posto.update');
Route::post('/usuarios/{id}/edit', [UsuarioController::class,'update'])->name('usuario.update');
Route::post('/bandeiras/{id}/edit', [BandeiraController::class,'update'])->name('bandeira.update');

Route::get('/postos/{id}/delete', [PostoController::class,'destroy'])->name('posto.delete');
Route::get('/usuarios/{id}/delete', [UsuarioController::class,'destroy'])->name('usuario.delete');
Route::get('/bandeiras/{id}/delete', [BandeiraController::class,'destroy'])->name('bandeira.delete');