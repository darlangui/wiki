<?php

namespace pdo\Domain\Model;

class Formation
{
    private readonly int $id;
    private string $type;
    private string $credencial_code;
    private string $description;
    private \DateTimeImmutable $date;

    public function __construct(int $id, string $type, string $credencial_code, string $description, \DateTimeImmutable $date)
    {
        $this->id = $id;
        $this->type = $type;
        $this->credencial_code = $credencial_code;
        $this->description = $description;
        $this->date = $date;
    }

    // getters
    public function id() : string
    {
        return $this->id;
    }

    public function type() : string
    {
        return $this->type;
    }

    public function credencialCode() : string
    {
        return $this->credencial_code;
    }

    public function description() : string
    {
        return $this->description;
    }

    public function date() : \DateTimeImmutable
    {
        return $this->date;
    }

    // setters

    public function changeType(string $type) : void
    {
        $this->type = $type;
    }

    public function changeCredencialCode(string $credencial_code) : void
    {
        $this->credencial_code = $credencial_code;
    }

    public function changeDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function changeDate(\DateTimeImmutable $date) : void
    {
        $this->date = $date;
    }
}