<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\Post;

interface PostRepository
{
    public function allPostsAndAuthors() : array;
    public function deletePost(Post $post, int $id) : bool;
    public function alterPost(Post $post) : bool;
    public function upPost(Post $post, int $id) : bool;
    public function verifyPost() : array;
    public function verifyPosts(int $id) : bool;
    public function accPosts(int $id) : bool;
}