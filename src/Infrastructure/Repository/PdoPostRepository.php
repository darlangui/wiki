<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\Post;
use wiki\src\Domain\Repository\PostsRepository;

class PdoPostRepository implements PostsRepository
{
    public function __construct()
    {
    }

    public function allPosts(): array
    {
        return [];
    }

    public function save(Post $post): bool
    {
        return false;
    }
}