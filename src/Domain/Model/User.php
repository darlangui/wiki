<?php

namespace wiki\src\Domain\Model;
class User
{
    private readonly int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function email() : string
    {
        return $this->email;
    }


    public function password() : ?string
    {
        return $this->password;
    }

    public function changeName(string $newName) : void
    {
        $this->name = $newName;
    }

    public function changeEmail(string $newEmail) : void
    {
        $this->email = $newEmail;
    }
}