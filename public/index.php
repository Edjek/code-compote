<?php

use App\Core\Autoloader;
use App\Core\Database;
use App\Core\Router;

require_once '../src/Core/Autoloader.php';

Autoloader::register();
Database::initConnection();

$router = new Router();
$router->execute();
