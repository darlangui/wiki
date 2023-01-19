<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\Post;

interface PostsRepository
{
    public function allPosts() : array;
    public function save(Post $post) : bool;
    public function remove(Post $post) : bool;
}