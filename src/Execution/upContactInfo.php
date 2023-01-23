<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use  \pdo\Domain\Model\User;

    $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
    $description = filter_input(INPUT_POST, "description", FILTER_DEFAULT);
    session_start();
    $id = $_SESSION['id'];
    $userRepository = new PdoUserRepository(CreateConnection::createConnection());
    try {
        $connection = CreateConnection::createConnection();
        $stmt = $connection->query("SELECT user.name, user.email, user.password, user.image, author.description FROM user
        INNER JOIN author ON author.user_id = user.id WHERE user.id = '$id'");
        foreach ($stmt->fetchAll() as $item) {
            $userRepository->save(new User($id, $item['name'], $email, $item['password'], $description, $item['image']));
        }
        header('Location: ../../pages/profile');
    }catch (PDOException $ex){
        echo $ex->getMessage();
        header('Location: ../../pages/profile');
    }
