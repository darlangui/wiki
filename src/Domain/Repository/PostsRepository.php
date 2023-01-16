<?php

namespace wiki\src\Domain\Repository;

use wiki\src\Domain\Model\Post;

interface PostsRepository
{
    public function allPosts() : array;
    public function authorPosts(): array;
    public function save(Post $post) : bool;
}