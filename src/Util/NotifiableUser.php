<?php

namespace App\Util;

use App\Interface\NotifiableUserInterface;

class NotifiableUser implements NotifiableUserInterface
{
    private $id;
    private string $email;
    private string $number;


    public function getEmail(): ?string 
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

}