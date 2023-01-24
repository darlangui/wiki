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

    public function alterPost(Post $post) : bool
    {
        $sqlQuery = "UPDATE post SET title = :title, information = :information, date = :date, image = :image WHERE post.id = '{$post->id()}'";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(':title', $post->title());
        $stmt->bindValue(':information', $post->information());
        $stmt->bindValue(':date', $post->date()->format('Y-m-d'));
        $stmt->bindValue(':image', $post->image());

        if($stmt->execute()){
            $sqlQuery = "SELECT category_id FROM post_has_category WHERE post_has_category.post_id = '{$post->id()}'";
            $stmt = $this->connection->query($sqlQuery);
            $list = $stmt->fetchAll();
            var_dump($list);
            foreach ($list as $item) {
                $sqlQuery = "UPDATE category SET name = :name WHERE id = '{$item['category_id']}'";
                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindValue(':name', $post->category());
            }
        }
        return $stmt->execute();
    }
    public function deletePost(Post $post, int $id) : bool
    {
        $sqlQuery = "DELETE FROM post_has_category WHERE post_id = '{$post->id()}' AND post_author_user_id = '{$id}'";
        $stmt = $this->connection->prepare($sqlQuery);
        if($stmt->execute()){
            $sqlQuery = "DELETE FROM comments WHERE post_id = '{$post->id()}'";
            $stmt = $this->connection->prepare($sqlQuery);
            if($stmt->execute()){
                $sqlQuery = "DELETE FROM post WHERE post.id = '{$post->id()}'";
                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->execute();
            }
        }
        return $stmt->execute();
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