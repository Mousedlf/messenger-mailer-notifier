<?php

namespace App\Controller;

use App\Util\Channel;
use App\Interface\NotifiableUserInterface;
use App\Service\NotifierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class NotificationController extends AbstractController
{
    #[Route('/', name:'app_home')]
    public function home() : Response
    {
        return $this->render('home/index.html.twig', []);
    }


    #[Route('/notify', name: 'notify')]
    public function notify( NotifierService $notifierService): Response  // #[CurrentUser] NotifiableUserInterface $user, 
    {

   //     /** @var NotifiableUserInterface $user */
        $user = $this->getUser();

        $notifierService->send($user, Channel::EMAIL, "topic", "body");

        $this->addFlash('notice','notification sent');
        return $this->redirectToRoute('app_home');
    }


}
