<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Formation;
use pdo\Domain\Model\Post;
use pdo\Domain\Repository\FormationRepository;

class PdoFormationRepository implements FormationRepository
{
    public function __construct()
    {
    }

    public function save(Post $post): bool
    {
        return false;
    }

    public function remove(Formation $formation): bool
    {
        return false;
    }
}