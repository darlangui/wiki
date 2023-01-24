<?php

namespace pdo\Infrastructure\Repository;

use pdo\Domain\Model\Post;
use pdo\Domain\Model\Specialization;
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

    public function allUsersAreAuthors(): array
    {
        $sqlQuery = 'SELECT user.id, user.name, user.email, user.image, author.description FROM user INNER JOIN author ON author.user_id = user.id';
        $stmt = $this->connection->query($sqlQuery);
        return $this->hydrateUserList($stmt);
    }

    public function allUser(): array
    {
        $sqlQuey = 'SELECT * FROM user';
        $stmt = $this->connection->query($sqlQuey);
        return $this->hydrateUserListTotal($stmt);
    }

    public function fillPost(): array
    {

    }

    public function deleteSpecilizationForUser(int $id_user, int $id_specialization): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM specialization_has_author WHERE specialization_id = ? AND author_user_id = ?;');
        $stmt->bindValue(1, $id_specialization, PDO::PARAM_INT);
        $stmt->bindValue(2, $id_user, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function fillSpecialization(int $id) : array
    {
        $sqlQuery = "SELECT specialization.id, specialization.name, specialization.date, specialization.code, specialization.description FROM specialization 
        INNER JOIN specialization_has_author ON specialization.id =  specialization_has_author.specialization_id
        WHERE specialization_has_author.author_user_id = '$id' ";
        $stmt = $this->connection->query($sqlQuery);
        $specializationList = $stmt->fetchAll();
        $listDate = [];

        foreach ($specializationList as $item) {
            $listDate[] = new Specialization($item['id'],$item['name'],new \DateTimeImmutable($item['date']),$item['code'],$item['description']);
        }

        return $listDate;
    }
    public function save(User $user) : bool
    {
        if($user->id() === null){
            return $this->insert($user);
        }else{
            return $this->update($user);
        }
    }

    private function update(User $user) : bool
    {
        $sqlQuery = "UPDATE user SET name = :name, email = :email, password = :password, image = :image WHERE user.id = '{$user->id()}'";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(':name', $user->name());
        $stmt->bindValue(':email', $user->email());
        $stmt->bindValue(':password', $user->password());
        $stmt->bindValue(':image', $user->image());
        if($stmt->execute()){
          $sqlQuery = "UPDATE author SET description = :description WHERE author.user_id = '{$user->id()}'";
          $stmt = $this->connection->prepare($sqlQuery);
          $stmt->bindValue(':description', $user->description());
          return $stmt->execute();
        }

        return false;
    }

    public function upSpecialization(Specialization $spec) : bool
    {
        $sqlQuery = "UPDATE specialization SET name = :name, date = :date, code = :code, description = :description WHERE specialization.id = :id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(':name', $spec->name());
        $stmt->bindValue(':date', $spec->date()->format('Y-m-d'));
        $stmt->bindValue(':code', $spec->code());
        $stmt->bindValue(':description', $spec->description());
        $stmt->bindValue(':id', $spec->id());

        return $stmt->execute();
    }

    private function insert(User $user) : bool
    {
        $userList = $this->allUser();

        foreach ($userList as $userDate){
            if($userDate->email() === $user->email()){
                return false;
            }
        }

        $insertQuery = 'INSERT INTO user (name, email, password, image) VALUES (:name, :email, :password, :image)';
        $stmt = $this->connection->prepare($insertQuery);

        $sucess = $stmt->execute([
            ':name' => $user->name(),
            ':email' => $user->email(),
            ':password' => $user->password(),
            ':image' => $user->image(),
        ]);

        if($sucess) {
            $id = $this->connection->lastInsertId();
            $user->definyId($id);
            $insertQuery = 'INSERT INTO author (description, user_id) VALUES (:description, :id)';
            $stmt = $this->connection->prepare($insertQuery);

            $Onsucess = $stmt->execute([
                ':description' => $user->description(),
                ':id' => $id,
            ]);
        }

        return $sucess;
    }

    public function login(string $email, string $password) : bool
    {
        $sqlQuery = 'SELECT * FROM user';
        $stmt = $this->connection->query($sqlQuery);

        $userDataList = $stmt->fetchAll();

        foreach ($userDataList as $userData){
            if($userData['email'] == $email && $userData['password'] == $password){
                session_start();
                $_SESSION['id'] = $userData['id'];
                return true;
            }
        }
        return false;
    }

    public function verifyUser(int $id) : User
    {
        $sqlQuery = 'SELECT user.id, user.name, user.email, user.password, author.description, user.image FROM user LEFT JOIN author ON author.user_id = user.id LEFT JOIN proofeader ON proofeader.user_id = user.id';
        $stmt = $this->connection->query($sqlQuery);

        $userDataList = $stmt->fetchAll();

        foreach ($userDataList as $userData){
            if($userData['id'] == $id){
                return new User($userData['id'],$userData['name'],$userData['email'],$userData['password'],$userData['description'],$userData['image']);
            }
        }
    }

    public function verifyTypeUser(int $id) : string
    {
        $sqlQuery = 'SELECT proofeader.user_id FROM proofeader';
        $stmt = $this->connection->query($sqlQuery);
        $proofeaderDataList = $stmt->fetchAll();

        foreach ($proofeaderDataList as $item) {
            if($item['user_id'] == $id){
                return 'isLogged Admin';
            }
        }
        return 'isLogged';
    }

    private function hydrateUserList(\PDOStatement $stmt) : array{
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $userData){
            $userList[] = new User($userData['id'], $userData['name'], $userData['email'], '', $userData['description'], $userData['image']);
        }

        return $userList;
    }

    private function hydrateUserListTotal(\PDOStatement $stmt) : array{
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $userData){
            $userList[] = new User($userData['id'], $userData['name'], $userData['email'], $userData['password'],'', $userData['image']);
        }

        return $userList;
    }

}