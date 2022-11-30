<?php

namespace src\Modelo\User;

abstract class User
{
    private readonly int $id_user;
    private string $login;
    private string $password;
    private string $name;

    public function __construct(int $id_user, string $login, string $password, string $name)
    {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
    }

    public function feedback(string $feedback)
    {
        
    }

    public function comment(string $comment)
    {
        
    }

}