<?php

use Tsi\Atividade3e4\controller\api\{Posto, Bandeira, Usuario};
//use tsi\atividade_3e4\controller\web\Posto as WebPosto;

$routes = [
    'api' => [
        'postos' => Posto::class,
        'bandeiras'=> Bandeira::class,
        'usuarios'=> Usuario::class,
    ],
    // 'web' => [
    //     'postos' => WebPosto::class
    // ]
];