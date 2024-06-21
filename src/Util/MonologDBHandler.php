<?php

namespace App\Util;

use App\Entity\NotificationLog;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class MonologDBHandler extends AbstractProcessingHandler
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }


    protected function write(LogRecord $record): void
    {
        $logEntry = new NotificationLog();
        $logEntry->setMessage($record->message);
        $logEntry->setLevel($record->level->name);
        $logEntry->setCreatedAt($record->datetime);
        $logEntry->setChannel($record->context[0]);
        //ajout user->usernama etc.

        $this->entityManager->persist($logEntry);
        $this->entityManager->flush();

    }

}