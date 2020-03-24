<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
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
    'get::register' => [
        'controller' => RegisterController::class,
        'method'     => 'getForm',
    ],
];
