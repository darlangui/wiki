<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\Post;
use wiki\src\Domain\Repository\PostsRepository;

class PdoPostRepository implements PostsRepository
{

    public function allPosts(): array
    {
        return [];
    }

    public function authorPosts(): array
    {
        return [];
    }

    public function save(Post $post): bool
    {
        return false;
    }
}