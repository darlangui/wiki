<?php

namespace pdo\Domain\Repository;
use pdo\Domain\Model\User;

interface UserRepository
{
    public function allUsersAreAuthors() : array;
    public function fillPost() : array;
    public function fillSpecialization() : array;
    public function save(User $user) : bool;
    public function alter(User $user) : bool;
    public function login(string $email, string $password) : bool;
    public function verifyUser(int $id) : User;
}