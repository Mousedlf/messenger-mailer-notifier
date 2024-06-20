<?php

namespace App\Interface;


interface NotifiableUserInterface 
{
    public function getEmail(): ?string;
    public function setEmail(string $email): static;


    
}