<?php

namespace pdo\Domain\Repository;
use pdo\Domain\Model\Specialization;
use pdo\Domain\Model\User;

interface UserRepository
{
    public function allUsersAreAuthors() : array;
    public function fillPost() : array;
    public function fillSpecialization(int $id) : array;
    public function save(User $user) : bool;
    public function login(string $email, string $password) : bool;
    public function verifyUser(int $id) : User;
    public function verifyTypeUser(int $id) : string;
    public function deleteSpecilizationForUser(int $id_user, int $id_specialization) : bool;
    public function upSpecialization(Specialization $spec) : bool;
    public function insertSpecialization(Specialization $spec, int $id) : bool;
}