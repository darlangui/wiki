<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Domain\Model\Specialization;
    use pdo\Domain\Model\User;

    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $cod = filter_input(INPUT_POST, 'cod', FILTER_DEFAULT);
    $date = filter_input(INPUT_POST, 'dat', FILTER_DEFAULT);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_DEFAULT);

    session_start();
    $id = $_SESSION['id'];

    $userRepository = new PdoUserRepository(CreateConnection::createConnection());

    try {
        $userRepository->insertSpecialization(new Specialization(null,$name,new \DateTimeImmutable($date),$cod,$desc), $id);
        header('Location: ../../pages/profile');
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
