<?php

namespace App\Controller\Front;

class HomeController
{
    public function showHomePage()
    {
        require_once '../templates/front/home.php';
    }
}