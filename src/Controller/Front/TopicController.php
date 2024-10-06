<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Respository\MessageRepository;

class TopicController extends AbstractController
{
    public function show($params): void
    {
        $repository = new MessageRepository();
        $messages = $repository->findAllByIdTopic($params['id']);
        $this->render('front/topic/show', ['messages' => $messages]);
    }
}
