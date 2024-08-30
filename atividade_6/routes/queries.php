<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Posto, Bandeira, User};
use Barryvdh\Debugbar\Facades\Debugbar;

Route::prefix('queries')->group(function () {

    // Query 1:
    Route::get('',function(){});

    // Query 2:
    Route::get('',function(){});

    // Query 3 (Com relacionamento):
    Route::get('',function(){});

    // Query 4 (Com relacionamento):
    Route::get('',function(){});

    // Query 5 (Em varios niveis):
    Route::get('',function(){});


});