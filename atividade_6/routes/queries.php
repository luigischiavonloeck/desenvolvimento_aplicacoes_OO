<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Posto, Bandeira, Usuario};
use Barryvdh\Debugbar\Facades\Debugbar;

Route::prefix('queries')->group(function () {

    // Carrega o posto com a sua bandeira
    Route::get('posto-bandeira/{id}', function ($id) {
        $result = Posto::find($id)->load('bandeira');
        dump($result->toArray());
        // return response()->json($result);
    });

    // Carrega o posto com os seus usuários
    Route::get('posto-usuarios/{id}', function($id) {
        $result = Posto::find($id)->load('usuarios');
        dump($result->toArray());
        // return response()->json($result);
    });

    // Carrega a bandeira com os seus postos
    Route::get('bandeira-postos/{id}', function($id) {
        Debugbar::startMeasure('sql', 'Time to run query!!!');
        $result = Bandeira::find($id)->load('postos');
        Debugbar::stopMeasure('sql');
        dump($result->toArray());
        Debugbar::info($result->postos->count());
    });

    // Retorna todos os postos que possuem usuários
    Route::get('postos/usuarios/', function() {
        dump(Posto::has('usuarios')->with('usuarios')->get()->toArray());
    });

    // Retorna todas as bandeiras que possuem postos
    Route::get('bandeiras/postos/', function() {
        dump(Bandeira::has('postos')->with('postos')->get()->toArray());
    });

});