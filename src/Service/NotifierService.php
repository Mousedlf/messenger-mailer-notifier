<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Notifier\TexterInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Message\SmsMessage;


class NotifierService
{
    public function __construct(
        private MailerInterface $mailer,
        private TexterInterface $texter
    ){}

    public function send($user, $channel, $topic, $body) // $user 
    {
              

        if($channel == "email"){

            $email = (new Email()) // si on veut avec template twig-> TemplatedEmail()
                ->from('email@demo.com')
                ->to($user->getEmail()) 
                ->subject($topic)
                ->text($body);
            $this->mailer->send($email);


        } elseif( $channel == "sms"){

            $sms = new SmsMessage(
                $user->getNumber(),
                $body
            );
            $this->texter->send($sms);


        } elseif( $channel == "push"){

            // PUSH https://symfony.com/doc/current/notifier.html#push-channel

        }


        return 'notif sent';
            
    }
}