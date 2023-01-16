<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\User;
use wiki\src\Domain\Repository\AuthorsRepository;

class PdoAuthorRepository implements AuthorsRepository
{
    public function __construct()
    {
    }

    public function allAuthors(): array
    {
        return [];
    }

    public function authorPosts(): array
    {
       return [];
    }

    public function save(User $user): bool
    {
        return false;
    }
}