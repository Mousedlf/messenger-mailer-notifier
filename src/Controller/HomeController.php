<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Message\Notification;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(MessageBusInterface $busInterface): Response
    {



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController'
            ]);
    }
}
