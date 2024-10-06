<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class Error404Controller extends AbstractController
{
    public function show(): void
    {
        $this->render('error-404');
    }
}
