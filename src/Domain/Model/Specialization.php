<?php

namespace pdo\Domain\Model;

class Specialization
{
    private readonly int $id;
    private int $analizy;
    private \DateTimeImmutable $date;
    private string $code;
    private string $description;

    public function __construct(int $id, int $analizy, \DateTimeImmutable $date, string $code, string $description)
    {
        $this->id = $id;
        $this->date = $date;
        $this->code = $code;
        $this->analizy = $analizy;
        $this->description = $description;
    }

    // Getters
    public function analizy(): int
    {
        return $this->analizy;
    }

    public function id() : int
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

    public function changeAnalizy() : void
    {
        $this->analizy =+ 1;
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