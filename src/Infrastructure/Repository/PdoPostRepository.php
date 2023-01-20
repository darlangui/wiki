<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Repository\PostRepository;

class PdoPostRepository implements PostRepository
{
    private \PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allPosts() : array
    {

    }
}