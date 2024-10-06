<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function showHomePage()
    {
        $this->render('front/home');
    }
}