<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Post;
use pdo\Domain\Repository\PostsRepository;

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