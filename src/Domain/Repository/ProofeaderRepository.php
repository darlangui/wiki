<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\Post;

interface ProofeaderRepository
{
    public function analyze(Post $post) : bool;
}