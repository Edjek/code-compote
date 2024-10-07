<?php

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($className) {
            $className = str_replace('App', 'src', $className);
            $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
            require_once '..' . DIRECTORY_SEPARATOR . $className . '.php';
        });
    }
}
