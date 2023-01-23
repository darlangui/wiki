<?php
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoUserRepository;
    include_once('../../vendor/autoload.php');
    $id =  filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

    $userRepository = new PdoUserRepository(CreateConnection::createConnection());
    session_start();

    try {
        if($userRepository->deleteSpecilizationForUser($_SESSION['id'], $id)) {
            header('Location: ../../pages/profile');
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
