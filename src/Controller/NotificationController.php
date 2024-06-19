<?php

namespace App\Controller;

use App\Channel;
use App\Service\NotifierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NotificationController extends AbstractController
{

    #[Route('/', name: 'app_form')]
    public function notify(NotifierService $notifierService): Response
    {
        $user = $this->getUser();

        $notifierService->send($user, Channel::EMAIL, "topic", "body");


       /**   OBJECTIF :  $notifierService->send($user, Channel::EMAIL, "topic", "body");
            */


        return $this->render('home/index.html.twig', []);
    }


}
