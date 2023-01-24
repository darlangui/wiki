<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Domain\Model\Post;
    use pdo\Infrastructure\Repository\PdoPostRepository;
    use \pdo\Infrastructure\Persistence\CreateConnection;

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    session_start();
    $iduse = $_SESSION['id'];
    try{
        $repository = new PdoPostRepository(CreateConnection::createConnection());
        $repository->deletePost(new Post($id,'','',new \DateTimeImmutable(),'','',''), $iduse);
        header('Location: ../../pages/profile');
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }