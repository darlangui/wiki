<?php

namespace pdo\Domain\Model;

class Specialization
{
    private ?int $id;
    private string $name;
    private \DateTimeImmutable $date;
    private string $code;
    private string $description;

    public function __construct(?int $id, string $name, \DateTimeImmutable $date, string $code, string $description)
    {
        $this->id = $id;
        $this->date = $date;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
    }

    // Getters
    public function name(): string
    {
        return $this->name;
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function date() : \DateTimeImmutable
    {
        return $this->date;
    }

    public function code() : string
    {
        return $this->code;
    }

    public function description() : string
    {
        return $this->description;
    }

    // Setters

    public function changeName(string $name) : void
    {
        $this->name = $name;
    }

    public function changeDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function changeData(\DateTimeImmutable $date) : void
    {
        $this->date = $date;
    }

    public function changeCode(string $code) : void
    {
        $this->code = $code;
    }


}