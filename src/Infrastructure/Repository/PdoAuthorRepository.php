<?php

namespace wiki\src\Infrastructure\Repository;

use wiki\src\Domain\Model\Post;
use wiki\src\Domain\Model\User;
use wiki\src\Domain\Repository\AuthorsRepository;
use PDO;

class PdoAuthorRepository implements AuthorsRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    //
    private function hydrateAuthorList(\PDOStatement $stmt) : array{
        $authorDataList = $stmt->fetchAll();
        $authorList = [];

        foreach ($authorDataList as $authorData){
            $authorList[] = new User(
                $authorData['id'],
                $authorData['name'],
                $authorData['email'],
                $authorData['password'],
                $authorData['image']
            );
        }
        return $authorList;
    }

    public function allAuthors(): array
    {
        $sqlQuery = 'SELECT * FROM authors';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateAuthorList($stmt);
    }

    public function save(User $user): bool
    {
        return false;
    }

    public function fillPostsOf(User $author) : void
    {
        // Colocar uma query com inner join para pegar informações de status, section, information ...
        $sqlQuery = '';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $author->id(), PDO::PARAM_INT);
        $stmt->execute();

        $postsDataList = $stmt->fetchAll();
        foreach ($postsDataList as $postData){
            $post = new Post(
                $postsDataList[''],
                $postsDataList[''],
                $postsDataList[''],
                $postsDataList[''],
                $postsDataList['']
            );
            $author->addPost($post);
        }
    }

}