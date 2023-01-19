<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Post;
use pdo\Domain\Model\User;
use pdo\Domain\Repository\AuthorsRepository;
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
                $authorData['id_user'],
                $authorData['name'],
                $authorData['login'],
                $authorData['password'],
                $authorData['image'],
                false
            );
        }
        return $authorList;
    }

    public function allAuthors(): array
    {
        $sqlQuery = 'SELECT user.id_user, user.name, user.login, user.password, user.image FROM author INNER JOIN user ON user.id_user = author.User_id_user';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateAuthorList($stmt);
    }

    public function save(User $user): bool
    {
        return false;
    }

    private function fillPostsOf(User $author) : void
    {
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