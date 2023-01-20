<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\User;
use pdo\Domain\Repository\UserRepository;
use PDO;
class PdoUserRepository implements UserRepository
{
    private \PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allUsersAreAuthors() : array
    {
        $sqlQuery = 'SELECT user.id, user.name, user.email, user.image, author.description FROM user INNER JOIN author ON author.user_id = user.id';
        $stmt = $this->connection->query($sqlQuery);
        return $this->hydrateUserList($stmt);
    }
    public function fillPost() : array
    {

    }
    public function fillSpecialization() : array
    {

    }
    public function save(User $user) : bool
    {

    }
    public function alter(User $user) : bool
    {

    }

    private function hydrateUserList(\PDOStatement $stmt) : array{
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $userData){
            $userList[] = new User($userData['id'], $userData['name'], $userData['email'], '', $userData['description'], $userData['image']);
        }

        return $userList;
    }

}