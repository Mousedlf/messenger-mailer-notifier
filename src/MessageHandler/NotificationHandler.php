<?php

namespace App\MessageHandler;

use App\Message\Notification;
use PhpParser\Node\Expr\AssignOp\Mod;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class NotificationHandler 
{
    public function __construct(private MailerInterface $mailerInterface)
    {}


    public function __invoke(Notification $message)
    {
        // envoi qqchose par email 
        echo 'Envoi en cours ...<br>';
        echo 'message envoyé:'. $message->getContent();

        $email = (new Email())
        ->from('email@email.com')
        ->to('dlfcaroline2@gmail.com') // recup email du formulaire
        ->subject('Confirmation message formulaire')
        ->text('Corps du mail');


        $this->mailerInterface->send($email);


    }
    
}