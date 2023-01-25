<?php
    use pdo\Infrastructure\Repository\PdoPostRepository;
    use pdo\Infrastructure\Persistence\CreateConnection;
    include_once ('../../vendor/autoload.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

    $repositorio = new PdoPostRepository(CreateConnection::createConnection());

    try {
        $repositorio->accPosts($id);
        echo 'aceito';
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }