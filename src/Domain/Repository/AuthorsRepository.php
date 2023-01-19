<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\User;

interface AuthorsRepository
{
    public function allAuthors(): array;
    public function save(User $user): bool;
}