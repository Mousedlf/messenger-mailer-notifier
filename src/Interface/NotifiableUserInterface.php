<?php

namespace App\Interface;


interface NotifiableUserInterface 
{
    public function getEmail(): ?string;
    public function setEmail(string $email): static;

    public function getNumber(): ?string;
    public function setNumber(string $number): static;
    
}