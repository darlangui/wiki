<?php

namespace pdo\Domain\Model;

class Proofeader extends User
{
    private int $revised;
    private \DateTimeImmutable $hiringDate;

    public function __construct(int $id, string $name, string $email, string $password, string $imageProfile)
    {
        parent::__construct($id, $name, $email, $password, $imageProfile);
    }

    public function revised() : int
    {
        $this->revised;
    }

    public function hiringDate() : \DateTimeImmutable
    {
        $this->hiringDate;
    }

    // O revisor é definido por número inteiro que serve para saber quantos posts esse proofeader já análisou.
    public function changeRevisor() : void
    {
        $this->revised = $this->revised + 1;
    }
}