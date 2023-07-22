<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capusle = new Capsule;

$capusle->addConnection([
    'driver' => get_env('DB_CONNECTION', 'mysql'),
    'host' => get_env('DB_HOST', 'localhost'),
    'database' => get_env('DB_DATABASE', ''),
    'username' => get_env('DB_USERNAME', 'root'),
    'password' => get_env('DB_PASSWORD', ''),
    'port' => get_env('DB_PORT', '3306'),
]);

$capusle->setAsGlobal();

$capusle->bootEloquent();
