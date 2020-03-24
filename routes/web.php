<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\HomeController;

return [
    'get::' => [
        'controller' => HomeController::class,
        'method'     => 'index',
    ],
    'get::login' => [
        'controller' => LoginController::class,
        'method'     => 'getForm',
    ],
];
