<?php

namespace wiki\src\Domain\Repository;

use wiki\src\Domain\Model\User;

interface AuthorsRepository
{
    public function allAuthors(): array;
    public function save(User $user): bool;
}