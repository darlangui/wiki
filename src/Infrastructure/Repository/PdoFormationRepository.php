<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\Formation;
use wiki\src\Domain\Model\Post;
use wiki\src\Domain\Repository\FormationRepository;

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