<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\Post;
use wiki\src\Domain\Repository\ProofeaderRepository;

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