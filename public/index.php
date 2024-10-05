<?php

include_once '../src/Core/Autoloader.php';

use App\Core\Autoloader;
use App\Core\Router;

Autoloader::register();

$router = new Router();
$router->execute();