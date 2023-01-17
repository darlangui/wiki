<?php

namespace wiki\src\Domain\Model;

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

}