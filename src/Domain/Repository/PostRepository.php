<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\Post;

interface PostRepository
{
    public function allPostsAndAuthors() : array;
}