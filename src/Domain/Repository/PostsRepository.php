<?php

namespace wiki\src\Domain\Repository;

interface PostsRepository
{
    public function allPosts() : array;
    public function authorPosts(): array;
}