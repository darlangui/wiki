<?php

namespace wiki\src\Domain\Repository;

use wiki\src\Domain\Model\Post;

interface ProofeaderRepository
{
    public function analyze(Post $post) : bool;
}