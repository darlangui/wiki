<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Post;
use pdo\Domain\Model\User;
use pdo\Domain\Repository\PostRepository;
use PDO;

class PdoPostRepository implements PostRepository
{
    private \PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allPostsAndAuthors() : array
    {
        $sqlQuery = 'SELECT post.id, post.title, post.information, post.date, post.image, post.author_user_id, post.status, user.name, user.email, category.name AS category_name FROM post 
        INNER JOIN user ON user.id = post.author_user_id 
        INNER JOIN post_has_category ON post.id = post_has_category.post_id 
        INNER JOIN category ON post_has_category.category_id = category.id WHERE post.status = "aprovado"';
        $stmt = $this->connection->query($sqlQuery);
        return $this->hydratePostList($stmt);
    }

    private function hydratePostList(\PDOStatement $stmt) : array
    {
        $postDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($postDataList as $postData){
            if(!array_key_exists($postData['id'], $userList)){
                $userList[$postData['id']] = new User($postData['author_user_id'], $postData['name'], $postData['email'], '', '', '');
            }
            $post = new Post($postData['id'],$postData['title'],$postData['information'],new \DateTimeImmutable($postData['date']),$postData['status'],$postData['image'], $postData['category_name']);
            $userList[$postData['id']]->addPost($post);
        }
        return $userList;
    }
}