<?php
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Domain\Model\User;
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Domain\Model\Specialization;
    include_once('../../vendor/autoload.php');

    $name = filter_input(INPUT_POST, "name_formation", FILTER_DEFAULT);
    $cod = filter_input(INPUT_POST, "code", FILTER_DEFAULT);
    $date = filter_input(INPUT_POST, "date", FILTER_DEFAULT);
    $desc = filter_input(INPUT_POST, "descript", FILTER_DEFAULT);
    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

    $repository = new PdoUserRepository(CreateConnection::createConnection());
    $spect = new Specialization($id, $name, new \DateTimeImmutable($date), $cod, $desc);

    try {
        if($repository->upSpecialization($spect)){
            header('Location: ../../pages/profile');
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
