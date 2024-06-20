<?php

namespace App\Controller;

use App\Util\Channel;
use App\Interface\NotifiableUserInterface;
use App\Service\NotifierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NotificationController extends AbstractController
{
    #[Route('/', name:'app_home')]
    public function home() : Response
    {
        return $this->render('home/index.html.twig', []);
    }


    #[Route('/notify', name: 'notify')]
    public function notify(NotifierService $notifierService, NotifiableUserInterface $user): Response
    {

        //$user = $this->getUser();

        $notifierService->send($user, Channel::PUSH, "topic", "body");


        $this->addFlash('notice','notification sent');

       return $this->redirectToRoute('app_home');
    }


}
