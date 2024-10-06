<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Respository\TopicRepository;

class HomeController extends AbstractController
{
    public function showHomePage(): void
    {
        $repository = new TopicRepository();
        $topics = $repository->findAll();
        $this->render('front/home', ['topics' => $topics]);
    }
}
