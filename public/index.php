<?php

include_once '../src/Core/Autoloader.php';

use App\Core\Autoloader;
use App\Core\Database;
use App\Core\Router;

Autoloader::register();
Database::initConnection();

$router = new Router();
$router->execute();