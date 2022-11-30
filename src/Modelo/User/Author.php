<?php

namespace src\Modelo\User;

class Author extends User
{
    private string $description;
    private string $information;

   public function __construct(int $id_user, string $login, string $password, string $name, string $information, string $description)
   {
       parent::__construct($id_user, $login, $password, $name);
        $this->information = $information;
        $this->description = $description;
   }
}