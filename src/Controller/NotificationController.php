<?php

namespace App\Controller;

use App\Contact;
use App\Form\ContactType;
use App\Message\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class NotificationController extends AbstractController
{

    #[Route('/form', name: 'app_form')]
    public function form(MailerInterface $mailer, TexterInterface $texter, Request $request): Response
    {
        $data = new Contact();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $bus->dispatch(new Notification('Patience'));


            $email = (new Email()) // si avec Template TemplatedEmail()
                ->from('email@demo.com')
                ->to($data->email)
                ->subject('Confirmation message formulaire')
                ->text('Corps du mail');

            //$mailer->send($email);



            } else { //envoi sms

            $sms = new SmsMessage(
                '+33641004114',
                'Ce message va t-il arriver ?'
            );
            $texter->send($sms);

            //($sms);
    
            }


            // message validation
            // redirection


        $this->addFlash(
            'notice',
            'thanks for the message'
        );

        }


        return $this->render('home/index.html.twig', [
            'form'=> $form
        ]);
    }


}

// https://grafikart.fr/tutoriels/symfony-contact-mailer-2187#autoplay

// symfony console messenger:consume async 
// CONSUMMING -> traitement automatique
// https://symfony.com/doc/current/messenger.html#consuming-messages-running-the-worker


// twilio 5A2K491A3SVYDWEQZWY789YU
// 12088259204