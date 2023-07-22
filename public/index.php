<?php

use Src\Router\Router;

require_once __DIR__ . '/../src/helpers/functions.php';
require_once __DIR__ . '/../bootstrap.php';


$router = Router::getInstance();
require_once dirname(__DIR__) . '/router/routes.php';
$router->run();
