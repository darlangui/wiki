<?php

namespace src\Modelo\User;

class Proofreader extends User
{
    private int $revised;
    private mixed $hiring_date;

    public function __construct(int $id_user, string $login, string $password, string $name, mixed $hiring_date)
    {
        parent::__construct($id_user, $login, $password, $name);
        $this->hiring_date = $hiring_date;
        $this->revised = 0;
    }

    public function revised()
    {
        
    }

}