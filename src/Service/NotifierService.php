<?php

namespace App\Service;

use App\Util\Channel;
use App\Interface\NotifiableUserInterface;
use Symfony\Component\Notifier\TexterInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Message\SmsMessage;


class NotifierService
{
    public function __construct(
        private MailerInterface $mailer,
        private TexterInterface $texter,
    ){}

    public function send(NotifiableUserInterface $user, string $channel, string $topic, string $body)
    {

     
        if ($channel == Channel::EMAIL) {

            dd($user);

            $email = (new Email()) // si on veut avec template twig-> TemplatedEmail()
                ->from('email@demo.com')
                ->to() // recup email du User
                ->subject($topic)
                ->text($body);
            $this->mailer->send($email);


        } else if ($channel == Channel::SMS) {

            $sms = new SmsMessage(
                '+', // recup number du User
                $body
            );

            $this->texter->send($sms);


        } else if ($channel == Channel::PUSH ) {

            // PUSH https://symfony.com/doc/current/notifier.html#push-channel

        }
           
    }
}