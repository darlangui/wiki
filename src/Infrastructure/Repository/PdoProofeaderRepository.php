<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Post;
use pdo\Domain\Repository\ProofeaderRepository;

class PdoProofeaderRepository implements ProofeaderRepository
{
    public function __construct()
    {
    }

    public function analyze(Post $post) : bool
    {
        return false;
    }
}