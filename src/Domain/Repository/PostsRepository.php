<?php

namespace wiki\src\Domain\Repository;

use wiki\src\Domain\Model\Post;

interface PostsRepository
{
    public function allPosts() : array;
    public function save(Post $post) : bool;
    public function remove(Post $post) : bool;
}